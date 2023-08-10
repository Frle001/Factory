<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Language;
use Carbon\Carbon;

class MealController extends Controller
{
    public function show(Request $request)
    {
        $langCode = $request->query('lang', 'en');
        $perPage = $request->query('per_page', 5);
        $languages = Language::pluck('code');

        if (!in_array($langCode, $languages->toArray())) {
            $langCode = 'en';
        }

        app()->setLocale($langCode);

        $query = Meal::with('translations');

        if ($request->has('with')) {
            $with = explode(',', $request->query('with'));

            if (in_array('ingredients', $with)) {
                $query->with('ingredients');
            }

            if (in_array('category', $with)) {
                $query->with('category');
            }

            if (in_array('tags', $with)) {
                $query->with('tags');
            }
        }

        if ($request->has('diff_time')) {
            $diffTime = date('Y-m-d H:i:s', $request->query('diff_time'));
            $query->where('created_at', '>=', $diffTime);
        }

        $meals = $query->paginate($perPage);

        $formattedMeals = [];

        foreach ($meals as $meal) {
            $formattedMeal = [
                'id' => $meal->id,
                'title' => $meal->translate($langCode)->title,
                'description' => $meal->translate($langCode)->description,
            ];

            if ($request->has('diff_time')) {
                $status = $meal->created_at >= $diffTime ? 'created' : 'deleted';
                $formattedMeal['status'] = $status;
            }

            if ($request->has('with')) {
                if (in_array('category', $with)) {
                    if ($meal->category) {
                        $formattedMeal['category'] = [
                            'id' => $meal->category->id,
                            'title' => $meal->category->translate($langCode)->title,
                            'slug' => $meal->category->slug,
                        ];
                    }
                }

                if (in_array('tags', $with) && $meal->tags->isNotEmpty()) {
                    $formattedMeal['tags'] = $meal->tags->map(function ($tag) use ($langCode) {
                        return [
                            'id' => $tag->id,
                            'title' => $tag->translate($langCode)->title,
                            'slug' => $tag->slug,
                        ];
                    });
                }

                if (in_array('ingredients', $with) && $meal->ingredients->isNotEmpty()) {
                    $formattedMeal['ingredients'] = $meal->ingredients->map(function ($ingredient) use ($langCode) {
                        return [
                            'id' => $ingredient->id,
                            'title' => $ingredient->translate($langCode)->title,
                            'slug' => $ingredient->slug,
                        ];
                    });
                }
            }

            $formattedMeals[] = $formattedMeal;
        }

        $paginationLinks = [
            'prev' => $meals->previousPageUrl(),
            'next' => $meals->nextPageUrl(),
            'self' => app('url')->full(),
        ];

        if ($paginationLinks['prev']) {
            $paginationLinks['prev'] = $paginationLinks['prev'] . '&' . http_build_query($request->except('page'));;
        }

        if ($paginationLinks['next']) {
            $paginationLinks['next'] = $paginationLinks['next'] . '&' . http_build_query($request->except('page'));
        }

        return response()->json([
            //'language' => $langCode,
            'meta' => [
                'currentPage' => $meals->currentPage(),
                'totalItems' => $meals->total(),
                'itemsPerPage' => $meals->perPage(),
                'totalPages' => $meals->lastPage(),
            ],
            'data' => $formattedMeals,
            'links' => $paginationLinks,
        ]);
    }
}
