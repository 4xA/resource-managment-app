<?php

namespace App\Observers;

use App\Models\PDFResource;

class PDFResourceObserver
{
    /**
     * Handle the PDFResource "force deleting" event.
     *
     * @param  \App\Models\PDFResource  $pDFResource
     * @return void
     */
    public function forceDeleting(PDFResource $pdfResource)
    {
        $media = $pdfResource->getFirstMedia(config('media_collections.pdf'));

        if (!isset($media)) {
            return;
        }

        $media->delete();
    }
}
