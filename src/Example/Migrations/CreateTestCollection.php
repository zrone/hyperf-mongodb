<?php
declare(strict_types=1);
namespace Zrone\MongoDb\Example\Migrations;
/**
 * Created by PhpStorm.
 * User: liyuzhao
 * Date: 2019-12-23
 * Time: 13:21
 */
use Zrone\MongoDb\MongoDbMigration;
class CreateTestCollection extends MongoDbMigration
{
    /**
     * 支持很多方法，请详细去看MongoDbMigration这个类
     * @throws \Zrone\MongoDb\Exception\MongoDBException
     */
    public function up()
    {
        $msg = [];
        $msg[] = $this->createCollection('test'); // 创建一个表
        $data = [
            ['dd' => 1, 'tt' => 2],
            ['dd' => 2, 'tt' => 4],
        ];
        $msg[] = $this->insertMany('test', $data); // 插入多条数据
        $msg[] = $this->createIndex('test', ['dd' => 1, 'tt' => 1]); // 在该表上创建索引
        $msg[] = $this->createIndexes('test', [['dd' => 1], ['tt' => 1]]); // 在该表上批量创建索引
        $msg[] = $this->dropCollection('test'); // 删除一个表
        return $msg;
    }

    /**
     * 迁移失败时会执行
     * @throws \Zrone\MongoDb\Exception\MongoDBException
     */
    public function down()
    {
        return 'error';
    }
}
