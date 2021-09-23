<?php

namespace App\Observers;

use App\Models\PDFResource;

class PDFResourceObserver
{
    /**
     * Handle the PDFResource "deleted" event.
     *
     * @param  \App\Models\PDFResource  $pDFResource
     * @return void
     */
    public function deleted(PDFResource $pdfResource)
    {
        $pdfResource->getFirstMedia(config('media_collections.pdf'))->delete();
    }

    /**
     * Handle the PDFResource "force deleted" event.
     *
     * @param  \App\Models\PDFResource  $pDFResource
     * @return void
     */
    public function forceDeleted(PDFResource $pdfResource)
    {
        $pdfResource->getFirstMedia(config('media_collections.pdf'))->delete();
    }
}
