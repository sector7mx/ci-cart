<?php

class Actions {
    public function getSiteStatus() {
        return array('status' => 'healthy',
            'time' => date('d-M-Y H:i'));
    }

    public function addTwoNumbers($params) {
        return array('result' => ($params['a'] + $params['b']));
    }
}
