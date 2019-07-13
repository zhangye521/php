<?php

namespace app\api\controller;

use think\Request;
use think\Controller;

class Upload extends Controller
{
    public function upload(Request $request)
    {
        // 获取表单上传文件
        $file = $request->file('file');
        if (empty($file)) {
            return json([
                "code" => 1,
                "msg" => "请选择上传文件",
            ]);
        }// 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
            $src = "\uploads\\" . $info->getSaveName();//获取文件的名字
            return json([
                "code" => 0,
                "msg" => "文件上传成功",
                "data" => [
                    "src" => $src,
                ]
            ]);
        } else { // 上传失败获取错误
            return json([
                "code" => 1,
                "msg" => $file->getError(),
            ]);
        }
    }

    public function uploads()
    {
        // 获取表单上传文件
        $files = request()->file('file');
        foreach ($files as $file) {
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                // 成功上传后 获取上传信息
                $src = "\uploads\\" . $info->getFilename();//获取文件的名字
                return json([
                    "code" => 0,
                    "msg" => "文件上传成功",
                    "data" => [
                        "src" => $src
                    ]
                ]);
            } else {// 上传失败获取错误信息
                return json([
                    "code" => 1,
                    "msg" => $file->getError(),
                ]);
            }
        }
    }

    public function del()
    {
        $imgs = input('post.')['img'];
        if (count($imgs)) {
            for ($i = 0; $i < count($imgs); $i++) {
                $src = UPLOAD_PATH . $imgs[$i];
                unlink($src);
            }
        } else {
            return json(["code" => 1, "msg" => "最少选择一张图片"]);
        }
    }
}