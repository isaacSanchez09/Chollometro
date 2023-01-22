<?php

namespace Database\Seeders;

use App\Models\Chollo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChollosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [   ['title' => 'PS5', 'description' => 'PlayStation 5 tiene dos grandes desafíos por delante. El primero de ellos es dar continuidad al legado de PlayStation 4, una consola muy exitosa que hasta ahora ha vendido casi 114 millones de unidades. Y el segundo es soportar la embestida de una Microsoft que llega a la nueva generación mucho mejor preparada de lo que lo estaba en 2013, cuando Xbox One aterrizó en las tiendas decidida a medirse de tú a tú con PS4.'
            , 'url'=> 'https://www.amazon.es/s?k=ps5&__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=355STYNQCT93C&sprefix=ps5%2Caps%2C107&ref=nb_sb_noss_1',
            'category' => 1, 'likes' => 103456, 'unlikes' => 12, 'price' => 550, 'price_sale' => 499, 'user_id'=>1],
            ['title' => 'XBOX', 'description' => 'Xbox Series X es la pieza central de una estrategia quirúrgicamente diseñada para ponérselo a Sony más difícil que nunca en una competencia directa de la que Nintendo se desvinculó con el lanzamiento en 2006 de Wii. Durante los próximos meses veremos qué respaldo damos los jugadores tanto a PlayStation 5 como a la consola más ambiciosa de Microsoft, pero objetivamente esta última máquina llega a la línea de salida con varias batallas ganadas de antemano. La guerra aún debe ser librada, pero Xbox Series X intimida.'
                ,'url'=> 'https://www.amazon.es/Microsoft-Xbox-Series-X-Standard/dp/B08JDSW1ZW/ref=sr_1_1?crid=2047T2JCPNZDR&keywords=xbox+series+x&qid=1674314792&sprefix=xbox+%2Caps%2C111&sr=8-1'
                ,'category' => 1, 'likes' => 2, 'unlikes' => 103456, 'price' => 550, 'price_sale' => 499, 'user_id'=>1],
            ['title' => 'TV Samsung', 'description' => 'Samsung Smart TV Neo QLED 4K 2022 55QN90B - Smart TV de 55" con Resolución 4K, Quantum Matrix Technology, Procesador Neo QLED 4K con Inteligencia Artificial, Quantum HDR 2000',
                'url'=> 'https://www.amazon.es/Samsung-Smart-QLED-2022-55QN90B/dp/B09MW4T97W/ref=sr_1_4?keywords=tv%2Bsamsung&qid=1674322670&sprefix=tv%2Bsa%2Caps%2C113&sr=8-4&th=1',
                'category' => 2, 'likes' => 103456, 'unlikes' => 55956, 'price' => 20000, 'price_sale' => 1157, 'user_id'=>2],
            ['title' => 'Iphone 14 pro Max', 'description' => 'Llega a tus manos una forma mágica de utilizar el iPhone, combinada con prestaciones de seguridad pensadas para salvar vidas. Y una espectacular cámara de 48 Mpx que consigue un nivel de detalle descomunal. Todo bajo el control del chip más avanzado en un smartphone. ¿Lo ves? Es que no se puede ser más Pro.',
                'url'=> 'https://www.amazon.es/Samsung-Smart-QLED-2022-55QN90B/dp/B09MW4T97W/ref=sr_1_4?keywords=tv%2Bsamsung&qid=1674322670&sprefix=tv%2Bsa%2Caps%2C113&sr=8-4&th=1',
                'category' => 3, 'likes' => 23000, 'unlikes' => 210000, 'price' => 16000, 'price_sale' => 15000, 'user_id'=>2],
            ['title' => 'Lavadora', 'description' => 'Cecotec Lavadora 7 Kg Carga Frontal Bolero DressCode 7000. 1400 rpm, 1950 W, 8 Programas, Aclarado Extra, DelayStart, Panel de Control con Display LED, Bloqueo para niños',
                'url'=> 'https://www.amazon.es/Cecotec-Lavadora-DressCode-Programas-DelayStart/dp/B097T1FL8Q/ref=sr_1_5?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1S2QWZ8V4LY82&keywords=lavadora&qid=1674323800&sprefix=lavadora%2Caps%2C113&sr=8-5',
                'category' => 4, 'likes' => 2300, 'unlikes' => 6043, 'price' => 299, 'price_sale' => 350, 'user_id'=>3],
            ['title' => "Levi's Graphic Crewneck B Sudadera Hombre", 'description' => "Modelo casual, elaborada en punto suave y con un logo Levi's en horizontal en el pecho",
                'url'=> 'https://www.amazon.es/Levis-Graphic-Camiseta-Hombre-Better/dp/B076YF1CVY/ref=sr_1_5?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=F4I186EEH89A&keywords=ropa&qid=1674323944&sprefix=ropa%2Caps%2C113&sr=8-5',
                'category' => 5, 'likes' => 2300, 'unlikes' => 6043, 'price' => 56, 'price_sale' => 22.50, 'user_id'=>3],
            ['title' => "Tommy Hilfiger", 'description' => "Tommy Hilfiger Reloj Analógico de Cuarzo multifunción para hombre con Correa en silicona Azul Marino - 1791476",
                'url'=> 'https://www.amazon.es/Reloj-Tommy-Hilfiger-Hombre-1791476/dp/B079QQ34RL/ref=sr_1_5?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=2MUJ5XK3GZ00N&keywords=reloj&qid=1674324148&sprefix=reloj+%2Caps%2C110&sr=8-5',
                'category' => 6, 'likes' => 567678, 'unlikes' => 45778, 'price' => 179, 'price_sale' => 128.10, 'user_id'=>3]];
        DB::table('Gangas')->insert($data);
    }
}
