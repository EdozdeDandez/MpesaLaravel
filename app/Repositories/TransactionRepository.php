<?php
/**
 * Created by PhpStorm.
 * User: kandie
 * Date: 5/24/18
 * Time: 12:19 PM
 */

namespace App\Repositories;


use App\Models\Transaction;

class TransactionRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
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

    public function export()
    {
        return $this->model
            ->select('id','customer_id','reference','amount','destination','service_id','created_at','message')->get()
            ->map(function ($transaction) {
                return [
                    '#'=>$transaction->id,
                    'Customer'=>$transaction->customer->fullName,
                    'Reference'=>$transaction->reference,
                    'Amount'=>$transaction->amount,
                    'Destination'=>$transaction->destination,
                    'Service'=>$transaction->service->name,
                    'Date'=>$transaction->created_at,
                    'Message'=>$transaction->message
                ];
            });
    }
}
