@extends('layouts.dashboard')

@section('content')

<!-- 
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>BMI Calculator</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>
    
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800" rel="stylesheet"> 
    
 
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body> -->

    <!-- app window -->
    <div id="app" class="animated fadeInUp" v-cloak>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="text-center gender">
                                <img src="/images/man.png" alt="">
                                <img src="/images/vrouw.png" alt="">
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autofocus>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required autofocus>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                            <div class="col-md-6">
                                <input id="height" type="number" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" required autofocus>

                                @if ($errors->has('height'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                                               
                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required autofocus>

                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!-- 
                         <div class="form-group">
                            <b-input-group prepend="Weight">
                                <b-form-input v-if="weightSelected == 'kg'" v-model.number="weight" type="number" min=0 step="any" size="lg"></b-form-input>
                                <b-form-input v-if="weightSelected == 'lb'" v-model.number="weight_lb" type="number" min=0 step="any" size="lg"></b-form-input>
                                <b-input-group-append>
                                    <div>
                                        <b-form-select v-model="weightSelected" :options="weightOptions" size="lg">
                                        <div>Selected: <strong>@{{ weightSelected }}</strong></div>
                                    </div>
                                </b-input-group-append>
                            </b-input-group>
                        </div>
                        <div class="form-group">
                            <b-input-group prepend="Height">
                                <b-form-input v-if="heightSelected !== 'us'" v-model.number="height" type="number" min=0 step="any" size="lg"></b-form-input>
                                <b-form-input v-if="heightSelected == 'us'" v-model.number="height_ft" type="number" min=0 step="any" size="lg"></b-form-input>
                                <b-form-input v-if="heightSelected == 'us'" v-model.number="height_inch" type="number" min=0 step="any" size="lg"></b-form-input>
                                <b-input-group-append>
                                    <div>
                                        <b-form-select v-model="heightSelected" :options="heightOptions" size="lg">
                                        <div>Selected: <strong>@{{ heightSelected }}</strong></div>
                                    </div>
                                </b-input-group-append>
                            </b-input-group>
                        </div>


                                <div id="row-result" class="row gradient-main">
                                    <div class="col">
                                        <span class="title">
                                            Your BMI is:
                                        </span><br>
                                        <span class="group">
                                            @{{ weightGroup }}
                                        </span>
                                    </div>
                                    <div class="col bmi">
                                        @{{ bmi }}
                                    </div>
                                </div> -->


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                weight: 75,
                weight_lb: 0,
                weightSelected: 'kg',
                weightOptions: [
                    { value: 'kg', text: 'kg' },
                    { value: 'lb', text: 'lb' }
                ],
                height: 180,
                height_ft: 0,
                height_inch: 0,
                heightSelected: 'cm',
                heightOptions: [
                    { value: 'cm', text: 'cm' },
                    { value: 'us', text: 'ft/in' }
                ]
            },
            computed: {
                bmi() {
                    return round(calculateBMI(this.weight, this.height), 1);
                },
                weightGroup() {
                    return getWeightGroup(this.bmi);
                }
            },
            watch: {
                weightSelected(val) {
                    if (val == 'lb') {
                        this.weight_lb = round(kgToLb(this.weight), 1);
                    }
                },
                weight_lb(val) {
                    this.weight = round(lbToKg(this.weight_lb), 1);
                },
                heightSelected(val) {
                    if (val == 'cm') {
                        this.height = round(imperialToCm(this.height_ft, this.height_inch), 0);
                    } else if (val == 'us') {
                        this.updateImperial(this.height);
                    }
                },
                height_ft(val) {
                    this.height = round(imperialToCm(val, this.height_inch), 0);
                },
                height_inch(val) {
                    this.height = round(imperialToCm(this.height_ft, val), 0);
                }
            },
            methods: {
                updateImperial(cm) {
                    this.height_ft = cmToImperial(cm).feet;
                    this.height_inch = cmToImperial(cm).inches;
                }
            }
        });
        // easy round function
        function round(value, precision) {
            return Number(Math.round(value+'e'+precision)+'e-'+precision);
        }
        
        // weight conversion functions
        function lbToKg(lb) {
            return lb * 0.45359237;
        }
        function kgToLb(kg) {
            return kg * 2.20462262185;
        }
        
        // length conversion functions
        function imperialToCm(feet, inches) {
            var cm = feet * 30.48; // ft to cm
            cm += inches * 2.54; // inch to cm
            return cm;
        }
        function cmToImperial(cm) {
            var realFeet = ((cm*0.393700) / 12);
            var feet = Math.floor(realFeet);
            var inches = Math.round((realFeet - feet) * 12);
            return {
                feet: feet,
                inches: inches
            }
        }
        
        // BMI functions
        function calculateBMI(kg, cm) {
            var m = cm / 100;
            if (kg > 0 && m > 0) {
                return kg / Math.pow(m, 2);
            } else {
                return 0;
            }
        }
        function getWeightGroup(bmi) {
            if (bmi == 0) {
                return "";
            } else if (bmi < 15) {
                return "Very Severely Underweight";
            } else if (bmi >= 15 && bmi < 16) {
                return "Severely Underweight";
            } else if (bmi >= 16 && bmi < 18.5) {
                return "Underweight";
            } else if (bmi >= 18.5 && bmi < 25) {
                return "Healthy Weight";
            } else if (bmi >= 25 && bmi < 30) {
                return "Overweight";
            } else if (bmi >= 30 && bmi < 35) {
                return "Moderately Obese";
            } else if (bmi >= 35 && bmi < 40) {
                return "Severely Obese";
            } else if (bmi > 40) {
                return "Very Severely Obese";
            }
        }
    </script>

</body>
</html>
-->

@endsection