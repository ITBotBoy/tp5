define({ "api": [
  {
    "type": "delete",
    "url": "/v1/king/:class/:id",
    "title": "删除分类",
    "name": "deleteKing",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "class",
            "description": "<p>分类类型：0英雄分类，1出装分类，2铭文分类</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": ""
          }
        ]
      }
    },
    "version": "1.0.0",
    "group": "王者荣耀接口",
    "filename": "application/api/controller/v1/King.php",
    "groupTitle": "王者荣耀接口",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:5000/v1/king/:class/:id"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/king",
    "title": "查询所有分类",
    "name": "getKing",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "modelId",
            "description": "<p>模块类型：1王者荣耀</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "page",
            "description": "<p>分页页数</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "count",
            "description": "<p>分页数量</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "type",
            "description": "<p>层级</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "class",
            "description": "<p>分类类型：0英雄分类，1出装分类，2铭文分类</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "name",
            "description": "<p>名称</p>"
          }
        ]
      }
    },
    "group": "王者荣耀接口",
    "filename": "application/api/controller/v1/King.php",
    "groupTitle": "王者荣耀接口",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:5000/v1/king"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/king/{class}/{id}",
    "title": "查询详细分类",
    "name": "getKingId",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "class",
            "description": "<p>分类类型：0英雄分类，1出装分类，2铭文分类</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": ""
          }
        ]
      }
    },
    "version": "1.0.0",
    "group": "王者荣耀接口",
    "filename": "application/api/controller/v1/King.php",
    "groupTitle": "王者荣耀接口",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:5000/v1/king/{class}/{id}"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/king",
    "title": "修改添加分类",
    "name": "saveKing",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "id",
            "description": "<p>修改id,添加不传</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "parentId",
            "description": "<p>上级id</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "modelId",
            "description": "<p>模块类型：1王者荣耀</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "class",
            "description": "<p>分类类型：0英雄分类，1出装分类，2铭文分类</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "type",
            "description": "<p>层级</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "description",
            "description": "<p>描述</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "info",
            "description": "<p>分类信息，JSON字符串</p>"
          }
        ]
      }
    },
    "group": "王者荣耀接口",
    "filename": "application/api/controller/v1/King.php",
    "groupTitle": "王者荣耀接口",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:5000/v1/king"
      }
    ]
  },
  {
    "type": "post",
    "url": "/cms/user/login",
    "title": "用户登录",
    "name": "userLogin",
    "version": "1.0.0",
    "group": "用户模块",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n  \"access_token\": \"\", token授权\n  \"refresh_token\": \"\" token授权过期传refresh_token获取access_token\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/cms/User.php",
    "groupTitle": "用户模块",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:5000/cms/user/login"
      }
    ]
  }
] });
