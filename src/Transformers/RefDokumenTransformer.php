<?php

namespace Kanekescom\Siasn\Referensi\Transformers;

use League\Fractal\TransformerAbstract;

class RefDokumenTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        return $item;
    }
}
