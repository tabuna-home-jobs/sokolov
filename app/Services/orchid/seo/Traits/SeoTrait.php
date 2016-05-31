<?php

namespace App\Services\orchid\seo\Traits;

use Route;
use App;

trait SeoTrait
{
    /**
     * @param null $id
     */
    public function render($id = null)
    {
        $meta = collect($this->generate($id));

        return view('seo::meta', [
            'SeoMetaTags' => $meta,
        ])->render();
    }

    /**
     * @param int|null $id
     */
    public function generate($id = null)
    {
        if (is_null($id)) {
            if (is_null(Route::current())) {
                return [
                    'title' => [],
                    'meta' => [],
                    'og' => [],
                ];
            }

            $currentRouteName = Route::current()->uri();
            $meta = $this
                ->where('route', $currentRouteName)
                ->where('lang', App::getLocale())
                ->first();
        } else {
            $meta = $this->find('story_id', $id);
        }

        if (is_null($meta)) {
            return [
                'title' => [],
                'meta' => [],
                'og' => [],
            ];
        }

        $meta = collect($meta->attributes);

        $meta = collect([
            'title' => $meta->only(['title']),
            'meta' => $meta->only(['description', 'keywords', 'robots']),
            'og' => $meta->only(['title', 'description', 'image', 'video', 'audio']),
            'custom' => $meta->only(['custom']),
        ]);

        foreach ($meta as $key => $value) {
            $meta[$key] = $value->reject(function ($item) {
                return is_null($item) || empty($item);
            });
        }

        return $meta;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function staticGetRoute()
    {
        //Берём все роуты
        $routeCollection = collect(Route::getRoutes());

        //Делаем доступными роуты без ASCII символов в ключе
        $newRouteCoolection = collect();
        foreach ($routeCollection as $key => $item) {
            $newRouteCoolection[strip_tags($key)] = $item;
        }

        //Только GET запросы
        $routeGetMethodCollection = collect($newRouteCoolection['*routes']['GET']);

        //Get запросы без параметров (Статика!)
        $allowGetRoutes = collect();
        foreach ($routeGetMethodCollection as $key => $value) {
            if (!preg_match('/\{*\}/', $key)) {
                $allowGetRoutes->push($key);
            }
        }

        return $allowGetRoutes;
    }
}
