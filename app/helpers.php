<?php

if (!function_exists('appVersion')) {
    function appVersion()
    {
        return 'v.1.1';
    }
}

if (!function_exists('monthName')) {
    function monthName($param)
    {
        switch ($param) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
            default:
                return 'Error';
        }
    }
}

if (!function_exists('unitKerjaId')) {
    function unitKerjaId()
    {
        return 1;
    }
}

if (!function_exists('angkaRomawi')) {
    function angkaRomawi($param)
    {
        switch ($param) {
            case 1:
                return 'I';
                break;
            case 2:
                return 'II';
                break;
            case 3:
                return 'III';
                break;
            case 4:
                return 'IV';
                break;
            case 5:
                return 'V';
                break;
            case 6:
                return 'VI';
                break;
            case 7:
                return 'VII';
                break;
            case 8:
                return 'VIII';
                break;
            case 9:
                return 'IX';
                break;
            case 10:
                return 'X';
                break;
            default:
                return 'Error';
        }
    }
}

