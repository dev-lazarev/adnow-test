<?php

namespace app\models;


class Mosaic extends AbstractMongoModel
{

    public function getBase()
    {
        return 'databasename';
    }

    public function getCollection()
    {
        return 'mosaic';
    }

    public function getFromId($id)
    {

        return $this->findOne([
            '_id' => $id,
        ]);
    }

    public function getFromName($name)
    {

        return $this->findOne([
            'name' => $name,
        ]);
    }


    public function update($id, $data = [])
    {

        $update = [];

        if (!empty($data)) {
            foreach ($data as $name => $value) {
                if ($name != '_id' && $name!='time') {
                    $update['$set'][$name] = $value;
                }
            }
        }
        $update['$inc']['time'] = (int)$data['time'];
        $update['$set']['updatedate'] = new \MongoDB\BSON\UTCDateTime(microtime(true));

        $this->write(
            [
                '_id' => $id
            ],
            $update
        );

        return $update['$set'];
    }


    public function create($data = [])
    {

        $update = [];


        if (!empty($data)) {
            foreach ($data as $name => $value) {
                if ($name != '_id' && $name!='time') {
                    $update[$name] = $value;
                }
            }
        }
        $update['time'] = (int)$data['time'];
        $update['createdate'] = new \MongoDB\BSON\UTCDateTime(microtime(true));

        $id = $this->insert(
            $update
        );

        return $id;
    }


}
