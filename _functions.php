<?php
    function displayList($array){
        $ta = '<tr>';
        foreach ($array as $transaction){
            if (is_null($transaction['icon'])){
                $ta .= '<td width="50" class="ps-3"></td>';
            } else {
                $ta .= '<td width="50" class="ps-3"> <i class="bi bi-' . $transaction['icon'] . ' fs-3"></i></td>';
            }
            $ta .= '
            <td>
            <time datetime="'
            . $transaction['date'] . 
            '" class="d-block fst-italic fw-light">'
            . date_format(new DateTime($transaction['date']), 'j/m/Y') . 
            '</time>'
            . $transaction['name'] .
            '</tdF>
            <td class="text-end">
            <span class="rounded-pill text-nowrap';

            if (intval($transaction['amount']) < 0){
                $ta .= ' bg-warning-subtle ';
            } 
            else{
                $ta .= ' bg-success-subtle ';
            } 
            
            $ta .= 'px-2">'
            . $transaction['amount'] .
            '</span>
            </td>
            <td class="text-end text-nowrap">
            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="#" class="btn btn-outline-danger btn-sm rounded-circle">
                <i class="bi bi-trash"></i>
            </a>
            </td>
            </tr>';
    }; 
    echo $ta;
};