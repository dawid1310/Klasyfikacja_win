<?php
    $num_input = 11;
    $num_output = 1;
    $num_layers = 4;
    $num_neurons_hidden = 30;
    $desired_error = 0.001;
    $max_epochs = 1000000;
    $epochs_between_reports = 100;
    $uploaddir = 'f:\XAMPP\htdocs\core\data/';
    
    $ann = fann_create_standard($num_layers, $num_input, $num_neurons_hidden, $num_neurons_hidden, $num_output);
    
    if ($ann) {
        fann_set_activation_function_hidden($ann, FANN_SIGMOID_SYMMETRIC);
        fann_set_activation_function_output($ann, FANN_SIGMOID_SYMMETRIC);
        $filename = $uploaddir."dataSet.data";
        if (fann_train_on_file($ann, $filename, $max_epochs, $epochs_between_reports, $desired_error))
            fann_save($ann, $uploaddir."ann.net");
    
        fann_destroy($ann);
    }
    header('Location: controllers/test.php');