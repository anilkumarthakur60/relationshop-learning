<?php

namespace App\Enum;

enum DynamicApiRequest:string
{

    case  Category = 'category';
    case  Post = 'post';
    case  Tag = 'tag';
    case  User = 'user';
    case  Comment = 'comment';
    case  Role = 'role';
    case  Permission = 'permission';
    case  Media = 'media';
    case Product = 'product';
}