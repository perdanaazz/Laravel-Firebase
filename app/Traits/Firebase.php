<?php

namespace App\Traits;

use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;

trait Firebase
{
    protected $factory, $firestore, $rtdb, $database;

    public function setup($config_path, $database_uri)
    {
        $this->factory   = (new Factory())->withServiceAccount(public_path($config_path))->withDatabaseUri($database_uri);
        $this->firestore = $this->factory->createFirestore();
        $this->rtdb      = $this->factory->createDatabase();
        $this->database  = $this->firestore->database();
    }

    public function countCollection($dataArray = null, $collection = null)
    {
        if ($collection) {
            $dataArray = $this->database->collection($collection)->documents();
        }

        $countData = 0;
        if ($dataArray) {
            foreach ($dataArray as $data) {
                $countData += 1;
            }
        }

        return $countData;
    }

    public function sumFieldCollection($dataArray, $field)
    {
        $sumField = 0;
        if ($dataArray) {
            foreach ($dataArray as $data) {
                $sumField = $sumField + $data->data()[$field];
            }
        }

        return $sumField;
    }

    public function getValue($reference)
    {
        $data = $this->rtdb->getReference($reference)->getValue();

        if (!$data) {
            return 404;
        }

        return $data;
    }
}
