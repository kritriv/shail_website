<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(

    'profile' => array(

        array(

            'field' => 'user_password',

            'label' => 'Password',

            'rules' => 'trim|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        )

    ),

    'employee' => array(

        array(

            'field' => 'user_password',

            'label' => 'User Password',

            'rules' => 'trim|required|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    ),

    'employee_edit' => array(

        array(

            'field' => 'user_password',

            'label' => 'User Password',

            'rules' => 'trim|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    ),

    'buyer' => array(

        array(

            'field' => 'user_password',

            'label' => 'User Password',

            'rules' => 'trim|required|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    ),

    'buyer_edit' => array(

        array(

            'field' => 'user_password',

            'label' => 'User Password',

            'rules' => 'trim|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    ),

    'seller' => array(

        array(

            'field' => 'user_password',

            'label' => 'User Password',

            'rules' => 'trim|required|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    ),

    'seller_edit' => array(

        array(

            'field' => 'user_password',

            'label' => 'User Password',

            'rules' => 'trim|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'confirm_password',

            'label' => 'Confirm Password',

            'rules' => 'trim|matches[user_password]|min_length[8]|max_length[16]'

        ),

        array(

            'field' => 'emailid',

            'label' => 'Email',

            'rules' => 'trim|required|valid_email'

        ),

        array(

            'field' => 'firstname',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    ),

    'ticket' => array(

        array(

            'field' => 'subject',

            'label' => 'Name',

            'rules' => 'trim|required'

        ),

    )

);

