# Workbench 测试指南

本项目已配置了 Laravel Testbench Workbench 环境，用于开发和测试 Nova JSON Field 包。

## 安装依赖

```bash
composer install
npm install
```

## Workbench 命令

### 1. 安装 Workbench 环境

```bash
# 使用 Composer
composer run workbench:install

# 或使用 npm
npm run workbench:install
```

### 2. 构建 Workbench 应用

```bash
# 使用 Composer
composer run workbench:build

# 或使用 npm
npm run workbench:build
```

### 3. 启动开发服务器

```bash
# 使用 Composer
composer run workbench:serve

# 或使用 npm
npm run workbench:serve
```

服务器启动后，你可以在浏览器中访问 `http://localhost:8000` 来测试你的 Nova 字段。

## 运行测试

```bash
# 使用 Composer
composer run test

# 或使用 npm
npm run test
```

## 开发流程

1. **安装环境**: 运行 `workbench:install` 来设置测试环境
2. **构建资源**: 运行 `workbench:build` 来构建前端资源
3. **启动服务器**: 运行 `workbench:serve` 来启动开发服务器
4. **开发测试**: 在浏览器中测试你的字段功能
5. **运行测试**: 使用 `test` 命令运行单元测试

## 配置文件

- `testbench.yaml`: Workbench 配置文件
- `phpunit.xml`: PHPUnit 测试配置
- `tests/`: 测试文件目录

## 注意事项

- 确保已安装 Laravel Nova
- Workbench 环境会创建一个临时的 Laravel 应用来测试你的包
- 所有的配置都已预设，你可以直接开始开发和测试