<?php
    // 载入配置文件
    include_once './database/config.php';

    // 数据库配置
    $db_config  = $db_argv['localhost'];
    $db_host    = $db_config['host'];
    $db_user    = $db_config['user'];
    $db_pass    = $db_config['pass'];
    $db_name    = $db_config['name'];
    $db_port    = $db_config['port'];

    // 生成新的数据库连接对象
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    $mysqli->query('SET NAMES utf8');
?>


<!DOCTYPE html>
<html>
<!-- ################################################################## -->
<head>
    <title>Databases</title>
</head>

<!-- ################################################################## -->
<body>
<!-- ################################################################## -->
    <table cellspacing="2" cellpadding="6" align="center" border="1">
        <tr><th colspan="8">公司</th></tr>

        <tr>
            <td align="center">公司ID</td>
            <td align="center">公司简称</td>
            <td align="center">公司标识</td>
            <td align="center">业务姓名</td>
            <td align="center">业务电话</td>
            <td align="center">服务热线</td>
            <td align="center">公司全称</td>
            <td align="center">公司地址</td>
        </tr>

        <?php
                echo "<tr>";
                echo "</tr>";
            $sql    = "SELECT * FROM `company`";
            $result = $mysqli->query($sql, MYSQLI_USE_RESULT);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>";
                    if ($key == 'time' || $key == 'production_date') {
                        echo date('Y-m-d H:i:s', $value);
                    }
                    else {
                        echo $value;
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            
        ?>
    </table>
</body>

</html>