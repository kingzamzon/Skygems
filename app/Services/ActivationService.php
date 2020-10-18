<?php

namespace App\Services;

use App\Activation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ActivationService
{
    public function index()
    {
        return Activation::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return Activation::create($data);
    }

    public function find(int $activation_id)
    {
        return Activation::find($activation_id);
    }

    public function update(int $activation_id, array $data)
    {
        return Activation::where('id', $activation_id)->update($data);
    }  

    public function destroy(int $activation_id)
    {
        return Activation::find($activation_id)->delete();
    }
}