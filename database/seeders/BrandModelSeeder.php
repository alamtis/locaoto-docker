<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\BrandModel;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dacia = [
            'dokker',
            'dokker van',
            'duster',
            'lodgy',
            'logan',
            'sandero',
            'sandero stepway',
            'sandero streetway',
        ];
        $this->createBrandModel($dacia, 'dacia');
        $renault = [
            'captur',
            'clio',
            'espace',
            'fluence',
            'grd scénic',
            'kadjar',
            'kangoo',
            'koleos',
            'master',
            'megane',
            'scenic',
            'talisman',
            'trafic',
            'twizy',
            'zoe',
        ];
        $this->createBrandModel($renault, 'renault');
        $hyundai = [
            'accent',
            'county',
            'creta',
            'elantra',
            'grand i10',
            'h1',
            'h100',
            'h350',
            'hd35l',
            'hd45',
            'hd72',
            'ioniq',
            'kona',
            'santa fe',
            'tucson',
            'i10',
            'i20',
            'i30',
            'i40',
        ];
        $this->createBrandModel($hyundai, 'hyundai');
        $peugeot = [
            '108',
            '2008',
            '208',
            '3008',
            '301',
            '308',
            '5008',
            '508',
            'bipper',
            'boxer',
            'expert',
            'partner',
            'pick up',
            'rcz',
            'rifter',
            'traveller',
        ];
        $this->createBrandModel($peugeot, 'peugeot');
        $fiat = [
            '500',
            'doblo',
            'doblo ccb',
            'doblo cargo',
            'ducato',
            'fiorino',
            'fullback',
            'panda',
            'tipo',
        ];
        $this->createBrandModel($fiat, 'fiat');
        $volkswagen = [
            'amarok',
            'arteon',
            'caddy',
            'caravelle',
            'coccinelle',
            'crafter',
            'eos',
            'golf',
            'jetta',
            'multivan',
            'passat',
            'polo',
            'tiguan',
            'touareg',
            'touran',
        ];
        $this->createBrandModel($volkswagen, 'volkswagen');
        $citroen = [
            'berlingo',
            'c-elysée',
            'c1',
            'c3',
            'c3 aircross',
            'c4',
            'c4 spacetourer',
            'c5 aircross',
            'grand c4 spacetourer',
            'jumper fg',
            'jumpy',
            'jumpy fg',
            'spacetourer',
        ];
        $this->createBrandModel($citroen, 'citroen');
        $ford = [
            'b-max',
            'c-max',
            'connect fg',
            'ecosport',
            'everest',
            'fiesta',
            'focus',
            'fusion berline',
            'kuga',
            'mustang',
            'ranger',
            'tourneo connect',
            'tourneo custom',
            'transit',
            'transit custom',
        ];
        $this->createBrandModel($ford, 'ford');
        $toyota = [
            'auris',
            'c-hr',
            'corolla',
            'fortuner',
            'hilux',
            'land cruiser',
            'prado',
            'prius',
            'rav4',
            'yaris',
        ];
        $this->createBrandModel($toyota, 'toyota');
        $nissan = [
            'juke',
            'micra',
            'nv 200 evalia',
            'navara',
            'note',
            'qashqai',
            'x-trail',
        ];
        $this->createBrandModel($nissan, 'nissan');
        $mercedesBenz = [
            'amg',
            'citan',
            'classe a',
            'classe b',
            'classe c',
            'classe cla',
            'classe cls',
            'classe e',
            'classe g',
            'classe s',
            'gla',
            'glc',
            'gle',
            'gls',
            'slc',
            'v',
            'vito',
        ];
        $this->createBrandModel($mercedesBenz, 'mercedes-benz');
        $bmw = [
            'm2',
            'm3',
            'série 1',
            'série 2',
            'série 2 gran tourer',
            'série 3',
            'série 4',
            'série 5',
            'série 6',
            'série 6 gran turismo',
            'série 7',
            'série 8',
            'x1',
            'x2',
            'x3',
            'x4',
            'x5',
            'x6',
            'x7',
            'z4',
        ];
        $this->createBrandModel($bmw, 'bmw');
        $audi = [
            'a1',
            'a3',
            'a4',
            'a5',
            'a6',
            'a7',
            'a8',
            'q2',
            'q3',
            'q5',
            'q7',
            'q8',
            's5',
            'tt',
        ];
        $this->createBrandModel($audi, 'audi');
        $jeep = [
            'cherokee',
            'compass',
            'grand cherokee',
            'renegade',
            'wrangler',
        ];
        $this->createBrandModel($jeep, 'jeep');
        $landRover = ['defender', 'discovery', 'range rover'];
        $this->createBrandModel($landRover, 'land-rover');
        $volvo = [
            's60',
            's90',
            'v40',
            'v40 cross country',
            'v60',
            'v90',
            'xc',
            'xc40',
        ];
        $this->createBrandModel($volvo, 'volvo');
        $alfaRomeo = ['4c', 'giulia', 'giulietta', 'spider', 'stelvio'];
        $this->createBrandModel($alfaRomeo, 'alfa romeo');
        $jaguar = ['e-pace', 'f-pace', 'f-type', 'xe', 'xf', 'xj'];
        $this->createBrandModel($jaguar, 'jaguar');
        $seat = ['arona', 'ateca', 'ibiza', 'leon', 'mii', 'toledo'];
        $this->createBrandModel($seat, 'seat');
        $kia = [
            'ceed',
            'cerato',
            'k2500',
            'picanto',
            'proceed',
            'rio',
            'seltos',
            'sorento',
            'sportage',
        ];
        $this->createBrandModel($kia, 'kia');
        $opel = [
            'adam',
            'astra',
            'combo',
            'corsa',
            'crossland',
            'crossland x',
            'grandland x',
            'insignia',
            'mokka',
            'movano',
            'vivaro',
            'vivaro combi',
        ];
        $this->createBrandModel($opel, 'opel');
        $abarth = ['124 spider', '500'];
        $this->createBrandModel($abarth, 'abarth');
        $dfsk = [
            'c31',
            'c35',
            'glory 580',
            'ix5',
            'k01',
            'k01h',
            'k01l',
            'k01s',
            'super cab',
        ];
        $this->createBrandModel($dfsk, 'dfsk');
        $isuzu = ['d-max', 'série n'];
        $this->createBrandModel($isuzu, 'isuzu');
        $honda = ['accord', 'cr-v', 'civic', 'hr-v', 'jazz'];
        $this->createBrandModel($honda, 'honda');
        $ds = ['ds 3 crossback', 'ds 7'];
        $this->createBrandModel($ds, 'ds');
        $lexus = ['es', 'is', 'ls', 'lx', 'nx', 'rx', 'ux'];
        $this->createBrandModel($lexus, 'lexus');
        $mahindra = ['genio', 'kuv 100', 'scorpio', 'xuv 500'];
        $this->createBrandModel($mahindra, 'mahindra');
        $maserati = [
            'ghibli',
            'grancabrio',
            'granturismo',
            'levante',
            'quattroporte',
        ];
        $this->createBrandModel($maserati, 'maserati');
        $mazda = ['cx-3', 'cx-5', 'série 3', 'série 6'];
        $this->createBrandModel($mazda, 'mazda');
        $mitsubishi = ['l200', 'pajero'];
        $this->createBrandModel($mitsubishi, 'mitsubishi');
        $mini = ['clubman', 'mini', 'paceman'];
        $this->createBrandModel($mini, 'mini');
        $porsche = ['911', 'boxster', 'cayenne', 'cayman', 'macan', 'panamera'];
        $this->createBrandModel($porsche, 'porsche');
        $skoda = [
            'fabia',
            'kamiq',
            'karoq',
            'kodiaq',
            'octavia',
            'rapid',
            'scala',
            'superb',
        ];
        $this->createBrandModel($skoda, 'skoda');
        $ssangyong = ['korando', 'kyron', 'rexton', 'stavic', 'tivoli'];
        $this->createBrandModel($ssangyong, 'ssangyong');
        $suzuki = [
            'baleno',
            'ignis',
            'jimny',
            'sx4 s-cross',
            'swift',
            'vitara',
        ];
        $this->createBrandModel($suzuki, 'suzuki');
        $fuso = ['canter'];
        $this->createBrandModel($fuso, 'fuso');
        $gazelle = ['next', 'next van'];
        $this->createBrandModel($gazelle, 'gazelle');
        $hino = ['3t5', '5t5'];
        $this->createBrandModel($hino, 'hino');
        $iveco = ['daily'];
        $this->createBrandModel($iveco, 'iveco');
    }
    private function createBrandModel(array $models, string $brandName)
    {
        $brand = Brand::create(['name' => $brandName]);
        foreach ($models as $model) {
            BrandModel::create([
                'brand_id' => $brand->id,
                'name' => $model,
            ]);
        }
    }
}
