<?php

use App\Models\HTMLResource;
use App\Models\LinkResource;
use App\Models\PDFResource;

return [
    'link' => LinkResource::class,
    'pdf' => PDFResource::class,
    'html' => HTMLResource::class,
];
