<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Pole :attribute musi zostać zaakceptowane.',
    'active_url'           => 'Pole :attribute nie jest poprawnym URL.',
    'after'                => 'Pole :attribute musi być datą po :date.',
    'alpha'                => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash'           => 'Pole :attribute może zawierać tylko litery, cyfry oraz ukośniki.',
    'alpha_num'            => 'Pole :attribute może zawierać tylko litery oraz cyfry.',
    'array'                => 'Pole :attribute musi być tablicą.',
    'before'               => 'Pole :attribute musi być datą przed :date.',
    'between'              => [
        'numeric' => 'Pole :attribute musi być pomiędzy :min i :max.',
        'file'    => 'Pole :attribute musi być pomiędzy :min i :max kilobitów.',
        'string'  => 'Pole :attribute musi być pomiędzy :min i :max znaków.',
        'array'   => 'Pole :attribute musi zawierać pomiędzy :min i :max przedmiotów.',
    ],
    'boolean'              => 'Pole :attribute musi być True lub False.',
    'confirmed'            => 'Podane hasła nie są takie same.',
    'date'                 => 'Pole :attribute nie jest poprawną datą.',
    'date_format'          => 'Pole :attribute does not match the format :format.',
    'different'            => 'Pole :attribute i :other muszą się różnić.',
    'digits'               => 'Pole :attribute musi być :digits cyframi.',
    'digits_between'       => 'Pole :attribute musi zawierać pomiędzy :min and :max cyfr.',
    'email'                => 'Podaj poprawny :attribute.',
    'filled'               => 'Pole :attribute jest wymagane.',
    'exists'               => 'Pole selected :attribute is niewłaściwe.',
    'image'                => 'Pole :attribute musi być zdjęciem.',
    'in'                   => 'Wybrany :attribute jest niewłaściwy.',
    'integer'              => 'Pole :attribute musi być liczbą całą.',
    'ip'                   => 'Pole :attribute musi być poprawnym adresem IP.',
    'max'                  => [
        'numeric' => 'Pole :attribute nie powinno być większe niż :max.',
        'file'    => 'Plik :attribute nie powinien być większy niż :max kilobajtów.',
        'string'  => 'Pole :attribute nie powinno przekraczać :max znaków.',
        'array'   => 'Lista :attribute nie powinna mieć więcej niż :max elementów.',
    ],
    'mimes'                => 'Pole :attribute musi być plikiem typu: :values.',
    'min'                  => [
        'numeric' => ':attribute musi mieć przynajmniej :min znaków.',
        'file'    => 'Pole :attribute must be at least :min kilobytes.',
        'string'  => ':attribute musi mieć przynajmniej :min znaków.',
        'array'   => 'Pole :attribute musi zawierać przynajmniej :min przedmiotów.',
    ],
    'not_in'               => 'Wybrany :attribute jest niepoprawny.',
    'numeric'              => 'Pole :attribute musi być cyfrą.',
    'regex'                => 'Format pola :attribute jest niewłaściwy.',
    'required'             => 'Pole :attribute jest obowiązkowe.',
    'required_if'          => 'Pole :attribute jest wymagane kiedy :other jest :value.',
    'required_with'        => 'Pole :attribute jest wymagane kiedy :values jest obecna.',
    'required_with_all'    => 'Pole :attribute jest wymagane kiedy :values jest obecna.',
    'required_without'     => 'Pole :attribute jest wymagane kiedy :values nie jest obecna.',
    'required_without_all' => 'Pole :attribute jest wymagane kiedy żadne :values nie są obecne.',
    'same'                 => 'Pole :attribute oraz :other muszą być takie same.',
    'size'                 => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file'    => 'Pole :attribute musi mieć :size kilobitów.',
        'string'  => 'Pole :attribute musi zawierać :size znaków.',
        'array'   => 'Pole :attribute must zawierać :size przedmiotów.',
    ],
    'timezone'             => 'Pole :attribute musi być porpawną strefą czasową.',
    'unique'               => 'Ten :attribute jest już w użyciu.',
    'url'                  => 'Format pola :attribute jest niewłaściwy.',
    'wrong_credentials'    => 'Podałeś błędny email lub hasło. Spróbuj ponownie',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'Nazwa',
        'email' => 'E-mail',
        'password' => 'Hasło'
    ],

];
