<?php 

if (! function_exists('switch_language_url')) {
    function switch_language_url(string $targetLocale = 'en'): string
    {
        $router    = service('router');
        $routeOpts = $router->getMatchedRouteOptions();
        $routeName = $routeOpts['as'] ?? null;

        if (! $routeName) {
            return base_url(); // fallback về home
        }

        // đổi suffix
        if ($targetLocale === 'en') {
            $targetRoute = preg_replace('/_vn$/', '_en', $routeName);
        } else {
            $targetRoute = preg_replace('/_en$/', '_vn', $routeName);
        }

        // Lấy tham số hiện tại của route (vd: slug)
        $params = $router->params();

        // Tạo URL mới theo tên route + tham số
        return route_to($targetRoute, ...$params);
    }
}


if (! function_exists('style_active_link')) {
    function style_active_link(string $url = ''): string    {
        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);
        //echo $firstSegment . "==" .$url;exit();

        //if($url =="")
        //    return " style='color: #C41E3A;' ";

        if($url == $firstSegment)        
            // Tạo URL mới theo tên route + tham số
            return " style='color: #C41E3A;' ";

        return '';
    }
}