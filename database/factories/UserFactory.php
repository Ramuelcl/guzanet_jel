<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->unique()->lastName();
        $prename=$this->faker->firstName();
        // $folder ='avatars';
        // $path=storage_path().'\\app\\public\\images\\'.$folder;
        $i = $this->faker->numberBetween($min = 0, $max = 6);
        if ($i==0) {
            $email="$name$prename";
        } elseif ($i==1) {
            $email="$prename.$name";
        } elseif ($i==2) {
            $email="$name.$prename";
        } elseif ($i==3) {
            $email="$prename$name";
        } elseif ($i==4) {
            $email=$name.'_'.$prename;
        } elseif ($i==5) {
            $email=$prename.'_'.$name;
        } else {
            $email=$this->faker->userName();
        }
        //
        $email = $this->limpiar_correo($email);
        $email = $email.'@'.$this->faker->freeEmailDomain();

        //     // 'avatar'=>$this->faker->image(
        //     //     $dir =$path,
        //     //     $width = 640,
        //     //     $height = 480,
        //     //     $img='',
        //     //     $onlyNameFile=false, //it's a filename without path
        //     //     $rndImg=false, // it's a no randomize images (default: `true`)
        //     //     $text = $this->getIniciales($prename.' '.$name)
        //     // ),

        return[
                            'name' => $prename.' '.$name,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function getIniciales($nombre)
    {
        $name = '';
        $explode = explode(' ', $nombre);
        foreach ($explode as $x) {
            $name .=  $x[0];
        }
        return $name;
    }

    public function limpiar_correo($string) //función para limpiar strings
    {
        $characters[0]= array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä');
        $characters[1]= array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A');
        $characters[2]= array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë');
        $characters[3]= array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E');
        $characters[4]= array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î');
        $characters[5]= array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I');
        $characters[6]= array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô');
        $characters[7]= array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O');
        $characters[8]= array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü');
        $characters[9]= array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U');
        $characters[10]= array('ñ', 'Ñ', 'ç', 'Ç');
        $characters[11]= array('n', 'N', 'c', 'C');
        //Esta parte se encarga de eliminar cualquier caracter extraño
        $characters[12]= array("|", "!", "","·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", " ");
        $characters[13]= array('');
        $string = trim($string);
        for ($i = 0; $i < 13; $i=$i+2) {
            $string = str_replace(
                $characters[$i],
                $characters[$i+1],
                $string
            );
        }

        return $string;
    }
}
