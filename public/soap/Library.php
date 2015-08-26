<?php

class Library {

    public function eightBall() {
        $options = array(
            "Without a doubt",
            "As I see it, yes",
            "Most likely",
            "Reply hazy, try again",
            "Better not tell you now",
            "Concentrate and ask again",
            "Don't count on it",
            "Very doubtful");

        return $options[array_rand($options)];
    }
}
