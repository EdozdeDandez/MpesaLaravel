<?php
/**
 * Created by PhpStorm.
 * User: kandie
 * Date: 5/21/18
 * Time: 3:26 PM
 */

namespace App\Repositories;


use App\Models\Service;

class ServiceRepository
{
    protected $model;

    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginated()
    {
        return $this->model->latest()->paginate(15);
    }


    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
