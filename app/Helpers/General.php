<?php
    
    use Illuminate\Support\Facades\Config;
    
    function get_languages()
    {
        
        return \App\Models\Language::active()->Selection()->get();
    }
    
    function get_default_lang()
    {
        return Config::get('app.locale');
    }
    
    function fileUpload($folder, $image)
    {
        if ($image != null) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs($folder, $fileName, 'public');
            
            \Illuminate\Support\Facades\Storage::disk($folder)->put($folder, $image);
            
            
            $file_path = 'images/' . $filePath;
            
            return $file_path;
        }
    }
    
    
    function uploadImage($folder, $image)
    {
        $image->store('/assets/images/'.$folder, $folder);
        
       /* $_disk = \Illuminate\Support\Facades\Storage::disk($folder);
       // $_disk =\Illuminate\Support\Facades\App['config']["filesystems.disks.{$folder}"];
        var_dump($_disk);
        $reflect = new ReflectionClass($_disk);
        $props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);
    
        foreach ($props as $prop) {
            print $prop->getName() . "\n";
        }
    
        var_dump($props[0]->name);*/
        //var_dump($_disk->driver);
       // exit;
     //   $image->store(\Illuminate\Support\Facades\Storage::disk($folder)->url, $folder);
        $filename = $image->hashName();
        $path = 'images/' . $folder . '/' . $filename;
        return $path;
    }
    
    function uploadImage_old($folder, $image)
    {
        $_folder = public_path('/assets/images/' . $folder . '/');
        // dump($image);
        //  dump($_folder);
        // $image->store('/assets/images/', $folder);
        // $image->store($_folder, $folder);
        
        //dump($image);
        
        //  $filename = $image->hashName();
        
        // $image->store(public_path(), $filename);
        
        
        //  dump($image);exit;
        //   $path = 'images/' . $folder . '/' . $filename;
        //  $path = 'images/' . $folder . '/' . $filename;
        
        // dump($path);exit();
        
        $imageName = time() . '.' . $image->extension();
        
        $image->move(public_path('assets/images/' . $folder), $imageName);
        
        $path = public_path('assets/images/' . $folder . '/') . $imageName;
        
        //dump($image);exit;
        return $path;
    }
    
    
    function uploadVideo($folder, $video)
    {
        $video->store('/', $folder);
        $filename = $video->hashName();
        $path = 'video/' . $folder . '/' . $filename;
        return $path;
    }


