<?php

namespace App\Http\Controllers;

enum TimeOfDay: string
{
    case Morning = "breakfast";
    case Afternoon = "lunch";
    case Evening = "dinner";
}
