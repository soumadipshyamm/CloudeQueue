<?php

use App\Models\Site\Setting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image;

if (!function_exists('isSluggable')) {
    function isSluggable($value)
    {
        return Str::slug($value);
    }
}

if (!function_exists('isMobileDevice')) {
    function isMobileDevice()
    {
        return preg_match(
            "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
            $_SERVER["HTTP_USER_AGENT"]
        );
    }
}
if (!function_exists('getRandomWord')) {
    function getRandomWord($len = 10)
    {
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }
}

if (!function_exists('arrayKeysExists')) {
    function arrayKeysExists(array $keys, array $arr)
    {
        return !array_diff_key(array_flip($keys), $arr);
    }
}

if (!function_exists('sidebarOpen')) {
    function sidebarOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'active open' : '';
    }
}
if (!function_exists('navbarOpen')) {
    function navbarOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'active' : '';
    }
}
if (!function_exists('generatePassword')) {
    function generatePassword($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?';
        $password = '';

        $characterCount = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $characterCount - 1)];
        }

        return $password;
    }
}

if (!function_exists('dropdownInnerOpen')) {
    function dropdownInnerOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'side-menu__sub-open' : '';
    }
}
if (!function_exists('dropdownarrowOpen')) {
    function dropdownarrowOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'transform rotate-180' : '';
    }
}
if (!function_exists('frontSidebarOpen')) {
    function frontSidebarOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'mm-active' : '';
    }
}
if (!function_exists('frontdropdownInnerOpen')) {
    function frontdropdownInnerOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'mm-show' : '';
    }
}

if (!function_exists('frontdropdownOpen')) {
    function frontdropdownOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'mm-active' : '';
    }
}
if (!function_exists('frontdropdownarrowOpen')) {
    function frontdropdownarrowOpen($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'mm-active' : '';
    }
}

if (!function_exists('genrateOtp')) {
    function genrateOtp($digit = 6)
    {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $digit; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        return $result;
    }
}

if (!function_exists('getS3URL')) {
    function getS3URL($filePath, $fileType = '', $fileAccessMode = 'private')
    {
        $storageDisk = Storage::disk('s3');

        if ($storageDisk->exists($filePath)) {
            if ($fileAccessMode == 'public') {
                $url = $storageDisk->url($filePath);
            } elseif ($fileAccessMode == 'private') {
                $url = $storageDisk->temporaryUrl(
                    $filePath,
                    now()->addMinutes(10080)
                );
            }

            return $url;
        } else {
            if ($fileType == 'profilePicture') {
                return asset('assets/frontend/images/no-profile-picture.jpeg');
            } elseif ($fileType == 'postImage') {

                return asset('assets/frontend/images/no-image-medium.png');
            } elseif ($fileType == 'collectionImage') {
                return asset('assets/frontend/images/no-image-small.png');
            } elseif ($fileType == 'profilePhotoId') {
                return asset('assets/frontend/images/file-not-found.png');
            } elseif ($fileType == 'cityImage') {
                return asset('assets/frontend/images/location-placeholder.jpeg');
            } else {
                return false;
            }
        }
    }
}

if (!function_exists('imageResizeAndSave')) {
    function imageResizeAndSave($imageUrl, $type = 'post/image', $filename = null)
    {
        if (!empty($imageUrl)) {

            Storage::disk('public')->makeDirectory($type . '/60x60');
            $path60X60 = storage_path('app/public/' . $type . '/60x60/' . $filename);
            $image = Image::make($imageUrl)->resize(
                null,
                60,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $image->save($path60X60, 70);

            //save 350X350 image
            Storage::disk('public')->makeDirectory($type . '/350x350');
            $path350X350 = storage_path('app/public/' . $type . '/350x350/' . $filename);
            $image = Image::make($imageUrl)->resize(
                null,
                350,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $image->save($path350X350, 75);

            return $filename;
        } else {
            return false;
        }
    }
}

if (!function_exists('uuidtoid')) {
    function uuidtoid($uuid, $table)
    {

        $dbDetails = DB::table($table)
            ->select('id')
            ->where('uuid', $uuid)->first();

        if ($dbDetails) {
            return $dbDetails->id;
        } else {
            abort(404);
        }
    }
}
if (!function_exists('slugtoname')) {
    function slugtoname($slug, $table)
    {
        $dbDetails = DB::table($table)
            ->select('name')
            ->where('slug', $slug)->first();

        if ($dbDetails) {
            return $dbDetails->name;
        } else {
            abort(404);
        }
    }
}
if (!function_exists('slugtoid')) {
    function slugtoid($slug, $table)
    {
        $dbDetails = DB::table($table)
            ->select('id')
            ->where('slug', $slug)->first();

        if ($dbDetails) {
            return $dbDetails->id;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('nametoslug')) {
    function nametoslug($name, $table)
    {
        $dbDetails = DB::table($table)
            ->select('slug')
            ->where('name', 'LIKE', "%{$name}%")->first();
        if ($dbDetails) {
            return $dbDetails->slug;
        } else {
            abort(404);
        }
    }
}
if (!function_exists('nametoid')) {
    function nametoid($name, $table)
    {
        $dbDetails = DB::table($table)
            ->select('id')
            ->where('name', 'LIKE', "%{$name}%")->first();
        if ($dbDetails) {
            return $dbDetails->id;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('customfind')) {
    function customfind($id, $table)
    {
        $dbDetails = DB::table($table)
            ->find($id);
        if ($dbDetails) {
            return $dbDetails;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('safeB64encode')) {
    function safeB64encode($string)
    {
        $pretoken = "";
        $posttoken = "";

        $codealphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codealphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codealphabet .= "0123456789";
        $max = strlen($codealphabet); // edited

        for ($i = 0; $i < 3; $i++) {
            $pretoken .= $codealphabet[rand(0, $max - 1)];
        }

        for ($i = 0; $i < 3; $i++) {
            $posttoken .= $codealphabet[rand(0, $max - 1)];
        }

        $string = $pretoken . $string . $posttoken;
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }
}

if (!function_exists('safeB64decode')) {
    function safeB64decode($string)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }

        $data = base64_decode($data);
        $data = substr($data, 3);
        $data = substr($data, 0, -3);

        return $data;
    }
}
if (!function_exists('getEta')) {
    function getEta(array $data)
    {
        $origin = array_values($data['from']);
        $destination = array_values($data['to']);
        $distanceResponse = Http::withUrlParameters([
            'endpoint' => config('constants.GOOGLE_MAP_DISTANCE_URL'),
            'origin' => implode(',', $origin),
            'destination' => implode(',', $destination),
            'key' => config('constants.GOOGLE_MAP_API_KEY'),
        ])->get('{+endpoint}?origins={origin}&destinations={destination}&mode=driving&key={key}');
        if ($distanceResponse->ok()) {
            $data = $distanceResponse->json();
            return [
                'destination' => $data['destination_addresses'][0] ?? '',
                'origin' => $data['origin_addresses'][0] ?? '',
                'distance' => $data['rows'][0]['elements'][0]['distance']['text'] ?? '',
                'eta' => $data['rows'][0]['elements'][0]['duration']['text'] ?? '',
            ];
        }
        return [];
    }
}

if (!function_exists('customEcho')) {
    function customEcho($str, $length)
    {
        if (strlen($str) <= $length) {
            return $str;
        } else {
            return substr($str, 0, $length) . '...';
        }
    }
}

if (!function_exists('formatTime')) {
    function formatTime($time)
    {
        return Carbon::parse($time)->format('dS M, Y, \\a\\t\\ g:i A');
    }
}

if (!function_exists('getSiteSetting')) {
    function getSiteSetting($key)
    {
        return Setting::where('key', $key)->value('value');
    }
}

if (!function_exists('checkMime')) {
    function checkMime($path)
    {
        if ($path) {
            $typeArray = explode('.', $path);
            $fileType = strtolower($typeArray[count($typeArray) - 1]) ?? 'jpg';
            switch ($fileType) {
                case 'png':
                    $image = 'image/png';
                    break;
                case 'jpg':
                    $image = 'image/jpg';
                    break;
                case 'jpeg':
                    $image = 'image/jpg';
                    break;
                case 'webp':
                    $image = 'image/webp';
                    break;
                case 'mp4':
                    $image = 'video/mp4';
                    break;
                case 'webm':
                    $image = 'video/webm';
                    break;
                default:
                    $image = 'image/*';
                    break;
            }
            return $image;
        }
        return 'image/*';
    }
}
if (!function_exists('getVideoCode')) {
    function getVideoCode($url)
    {
        if (str_contains($url, '?v=')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            return $my_array_of_vars['v'];
        } else {
            parse_str(parse_url($url, PHP_URL_PATH), $my_array_of_vars);
            return preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', array_keys($my_array_of_vars)[0]);
        }
    }
}
