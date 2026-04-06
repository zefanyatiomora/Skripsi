<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OkupasiKompetensiSeeder extends Seeder
{
    public function run(): void
    {
        $mapping = [

            // ======================
            // ITG & PDP
            // ======================
            'R1' => ['TIK.DEV0620','TIK.ITG0608'],
            'R2' => ['TIK.ITG0608'],
            'R3' => ['TIK.ITG0608'],
            'R4' => ['TIK.ITG0607'],
            'R5' => ['TIK.ITG0606'],
            'R6' => ['TIK.ITG0606'],
            'R7' => ['TIK.ITG0606'],
            'R8' => ['TIK.ITG0606'],

            // ======================
            // CONSULTANT / ARCHITECT
            // ======================
            'R9' => ['TIK.ITG0605'],
            'R10' => ['TIK.ITG0605'],
            'R11' => ['TIK.ITG0605'],
            'R12' => ['TIK.ITG0604'],
            'R13' => ['TIK.ITG0604'],
            'R14' => ['TIK.ITG0604'],
            'R15' => ['TIK.ITG0603'],
            'R16' => ['TIK.ITG0603'],
            'R17' => ['TIK.ITG0603'],
            'R18' => ['TIK.ITG0603'],
            'R19' => ['TIK.ITG0603'],
            'R20' => ['TIK.DEV0612','TIK.ITG0603'],
            'R21' => ['TIK.ITG0603'],
            'R22' => ['TIK.ITG0603'],

            // ======================
            // PROJECT MANAGEMENT / PO
            // ======================
            'R23' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0615','TIK.DEV0617','TIK.ITG0602'],
            'R24' => ['TIK.DEV0617','TIK.ITG0602'],
            'R25' => ['TIK.DEV0609','TIK.ITG0602'],
            'R26' => ['TIK.ITG0602'],
            'R27' => ['TIK.ITG0602'],
            'R28' => ['TIK.DEV0609','TIK.DEV0613','TIK.ITG0602'],
            'R29' => ['TIK.DEV0609','TIK.DEV0613','TIK.ITG0602'],
            'R30' => ['TIK.DEV0613','TIK.DEV0615','TIK.ITG0602'],
            'R31' => ['TIK.ITG0602'],
            'R32' => ['TIK.ITG0602'],
            'R33' => ['TIK.ITG0602'],
            'R34' => ['TIK.ITG0602'],
            'R35' => ['TIK.ITG0602'],
            'R36' => ['TIK.ITG0602'],
            'R37' => ['TIK.ITG0602'],

            // ======================
            // SCRUM
            // ======================
            'R38' => ['TIK.ITG0601'],
            'R39' => ['TIK.ITG0601'],
            'R40' => ['TIK.ITG0601'],
            'R41' => ['TIK.ITG0601'],
            'R42' => ['TIK.ITG0601'],
            'R43' => ['TIK.ITG0601'],

            // ======================
            // PRIVACY
            // ======================
            'R44' => ['TIK.DEV0620'],
            'R45' => ['TIK.DEV0620'],

            // ======================
            // ERP
            // ======================
            'R46' => ['TIK.DEV0618','TIK.DEV0619'],
            'R47' => ['TIK.DEV0618','TIK.DEV0619'],
            'R48' => ['TIK.DEV0618','TIK.DEV0619'],
            'R49' => ['TIK.DEV0619'],
            'R50' => ['TIK.DEV0618','TIK.DEV0619'],
            'R51' => ['TIK.DEV0618','TIK.DEV0619'],
            'R52' => ['TIK.DEV0618','TIK.DEV0619'],
            'R53' => ['TIK.DEV0618','TIK.DEV0619'],
            'R54' => ['TIK.DEV0618'],
            'R55' => ['TIK.DEV0618'],
            'R56' => ['TIK.DEV0618'],
            'R57' => ['TIK.DEV0618'],
            'R58' => ['TIK.DEV0618'],
            'R59' => ['TIK.DEV0618'],
            'R60' => ['TIK.DEV0618'],

            // ======================
            // MULTIMEDIA
            // ======================
            'R61' => ['TIK.DEV0617'],
            'R62' => ['TIK.DEV0617'],
            'R63' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0617'],
            'R64' => ['TIK.DEV0617'],
            'R65' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0615','TIK.DEV0617'],
            'R66' => ['TIK.DEV0617'],
            'R67' => ['TIK.DEV0617'],
            'R68' => ['TIK.DEV0617'],
            'R69' => ['TIK.DEV0617'],

            // ======================
            // DATA
            // ======================
            'R70' => ['TIK.DEV0616'],
            'R71' => ['TIK.DEV0616'],
            'R72' => ['TIK.DEV0616'],
            'R73' => ['TIK.DEV0616'],

            // ======================
            // PROGRAMMING CORE
            // ======================
            'R74' => ['TIK.DEV0601','TIK.DEV0602','TIK.DEV0604','TIK.DEV0615'],
            'R75' => ['TIK.DEV0601','TIK.DEV0603','TIK.DEV0604','TIK.DEV0615'],
            'R76' => ['TIK.DEV0601','TIK.DEV0615'],
            'R77' => ['TIK.DEV0601','TIK.DEV0615'],
            'R78' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0615'],
            'R79' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0615'],
            'R80' => ['TIK.DEV0601','TIK.DEV0602','TIK.DEV0603','TIK.DEV0615'],
            'R81' => ['TIK.DEV0601','TIK.DEV0615'],
            'R82' => ['TIK.DEV0601','TIK.DEV0603','TIK.DEV0604','TIK.DEV0615'],
            'R83' => ['TIK.DEV0609','TIK.DEV0613','TIK.DEV0615'],
            'R84' => ['TIK.DEV0601','TIK.DEV0610','TIK.DEV0613','TIK.DEV0615'],

            // ======================
            // INFRASTRUCTURE
            // ======================
            'R85' => ['TIK.DEV0615'],
            'R86' => ['TIK.DEV0601','TIK.DEV0603','TIK.DEV0615'],
            'R87' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0615'],
            'R88' => ['TIK.DEV0614'],
            'R89' => ['TIK.DEV0614'],
            'R90' => ['TIK.DEV0614'],
            'R91' => ['TIK.DEV0614'],
            'R92' => ['TIK.DEV0614'],
            'R93' => ['TIK.DEV0614'],
            'R94' => ['TIK.DEV0614'],
            'R95' => ['TIK.DEV0614'],
            'R96' => ['TIK.DEV0614'],
            'R97' => ['TIK.DEV0614'],
            'R98' => ['TIK.DEV0614'],
            'R99' => ['TIK.DEV0614'],
            'R100' => ['TIK.DEV0614'],
            'R101' => ['TIK.DEV0614'],
            'R102' => ['TIK.DEV0614'],
            'R103' => ['TIK.DEV0614'],
            'R104' => ['TIK.DEV0614'],
            'R105' => ['TIK.DEV0614'],
            'R106' => ['TIK.DEV0614'],

            // ======================
            // ANALYST
            // ======================
            'R107' => ['TIK.DEV0613'],
            'R108' => ['TIK.DEV0613'],
            'R109' => ['TIK.DEV0609','TIK.DEV0613'],
            'R110' => ['TIK.DEV0613'],
            'R111' => ['TIK.DEV0613'],
            'R112' => ['TIK.DEV0613'],

            // ======================
            // MOBILE
            // ======================
            'R113' => ['TIK.DEV0612'],
            'R114' => ['TIK.DEV0612'],
            'R115' => ['TIK.DEV0612'],
            'R116' => ['TIK.DEV0612'],
            'R117' => ['TIK.DEV0612'],
            'R118' => ['TIK.DEV0612'],
            'R119' => ['TIK.DEV0612'],
            'R120' => ['TIK.DEV0612'],
            'R121' => ['TIK.DEV0612'],
            'R122' => ['TIK.DEV0612'],

            // ======================
            // PROGRAMMER
            // ======================
            'R123' => ['TIK.DEV0611'],
            'R124' => ['TIK.DEV0611'],
            'R125' => ['TIK.DEV0611'],
            'R126' => ['TIK.DEV0610','TIK.DEV0611'],
            'R127' => ['TIK.DEV0602','TIK.DEV0603','TIK.DEV0609','TIK.DEV0611'],
            'R128' => ['TIK.DEV0602','TIK.DEV0611'],
            'R129' => ['TIK.DEV0602','TIK.DEV0603','TIK.DEV0604','TIK.DEV0610','TIK.DEV0611'],
            'R130' => ['TIK.DEV0602','TIK.DEV0610','TIK.DEV0611'],
            'R131' => ['TIK.DEV0611'],
            'R132' => ['TIK.DEV0611'],

            // ======================
            // MIX
            // ======================
            'R133' => ['TIK.DEV0601','TIK.DEV0604','TIK.DEV0610'],
            'R134' => ['TIK.DEV0608'],
            'R135' => ['TIK.DEV0608'],
            'R136' => ['TIK.DEV0608'],
            'R137' => ['TIK.DEV0608'],
            'R138' => ['TIK.DEV0608'],
            'R139' => ['TIK.DEV0608'],
            'R140' => ['TIK.DEV0608'],
            'R141' => ['TIK.DEV0608'],

            // ======================
            // BUSINESS ANALYST
            // ======================
            'R142' => ['TIK.DEV0607'],
            'R143' => ['TIK.DEV0607'],
            'R144' => ['TIK.DEV0607'],
            'R145' => ['TIK.DEV0607'],
            'R146' => ['TIK.DEV0607'],
            'R147' => ['TIK.DEV0607'],

            // ======================
            // SYSTEM PROGRAMMER
            // ======================
            'R148' => ['TIK.DEV0606'],
            'R149' => ['TIK.DEV0606'],
            'R150' => ['TIK.DEV0606'],
            'R151' => ['TIK.DEV0606'],
            'R152' => ['TIK.DEV0606'],

            // ======================
            // APP SUPERVISOR
            // ======================
            'R153' => ['TIK.DEV0605'],
            'R154' => ['TIK.DEV0605'],
            'R155' => ['TIK.DEV0605'],
            'R156' => ['TIK.DEV0605'],
            'R157' => ['TIK.DEV0605'],
            'R158' => ['TIK.DEV0605'],
            'R159' => ['TIK.DEV0605'],

            // ======================
            // FINAL
            // ======================
            'R160' => ['TIK.DEV0601','TIK.DEV0604'],
            'R161' => ['TIK.DEV0601','TIK.DEV0604'],
            'R162' => ['TIK.DEV0602','TIK.DEV0603','TIK.DEV0604'],
            'R163' => ['TIK.DEV0601','TIK.DEV0604'],
            'R164' => ['TIK.DEV0601','TIK.DEV0604'],
            'R165' => ['TIK.DEV0601','TIK.DEV0603','TIK.DEV0604'],
            'R166' => ['TIK.DEV0601','TIK.DEV0604'],
            'R167' => ['TIK.DEV0601','TIK.DEV0604'],
            'R168' => ['TIK.DEV0603','TIK.DEV0604'],
            'R169' => ['TIK.DEV0601','TIK.DEV0603','TIK.DEV0604'],
            'R170' => ['TIK.DEV0604'],
            'R171' => ['TIK.DEV0602','TIK.DEV0603'],
            'R172' => ['TIK.DEV0603'],
            'R173' => ['TIK.DEV0602','TIK.DEV0603'],
            'R174' => ['TIK.DEV0602'],
            'R175' => ['TIK.DEV0601'],
        ];

        foreach ($mapping as $kodeKompetensi => $kodeOkupasis) {

            $kompetensi = DB::table('kompetensi')
                ->where('kode_kompetensi', $kodeKompetensi)
                ->first();

            if (!$kompetensi) continue;

            foreach ($kodeOkupasis as $kodeOkupasi) {

                $okupasi = DB::table('okupasi')
                    ->where('kode_okupasi', $kodeOkupasi)
                    ->first();

                if (!$okupasi) continue;

                DB::table('okupasi_kompetensi')->insert([
                    'id_kompetensi' => $kompetensi->id_kompetensi,
                    'id_okupasi' => $okupasi->id_okupasi, // sesuaikan kalau beda
                ]);
            }
        }
    }
}