## tp-orm扩展包

*可以使用tp6.x的动态绑定属性到父模型方法*

*安装*

在composer.json增加
```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/wdaglb/tp-orm"
    }
]
```

使用composer require ke/tp-orm dev-master即可

*使用*

可以使用动态绑定关联属性，可以使用

```
$user = User::find(1)->bindAttr('profile',['email','nickname']);
// 输出Profile关联模型的email属性
echo $user->email;
echo $user->nickname;
```

同样支持指定属性别名

```
$user = User::find(1)->bindAttr('profile',[
	'email',
    'truename'	=> 'nickname',
]);
// 输出Profile关联模型的email属性
echo $user->email;
echo $user->truename;
```