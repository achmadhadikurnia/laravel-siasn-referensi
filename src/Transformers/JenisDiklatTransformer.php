<?php

namespace Kanekescom\Siasn\Referensi\Transformers;

use League\Fractal\TransformerAbstract;

class JenisDiklatTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        return [
            'id' => $item['id'],
            'jenis_diklat' => $item['jenis_diklat'],
        ];
    }
}
