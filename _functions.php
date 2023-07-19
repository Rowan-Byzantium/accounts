<?php
    // function displayList($array){
    $ta = "<tr>";
    foreach ($transactions as $transaction){
    $ta .= '<td width="50" class="ps-3"></td> 
        <td>
            <time datetime="' . $transaction['date'] . '" class="d-block fst-italic fw-light">' . date_format(new DateTime($transaction['date']), 'j/m/Y') . '</time>'.
            $transaction['name'] .
        '</tdF>
        <td class="text-end">
            <span class="rounded-pill text-nowrap bg-warning-subtle px-2">'
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
// }
    // <i class="bi bi-car-front fs-3"></i>