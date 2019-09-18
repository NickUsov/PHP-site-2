<?php 
    if(isset($_POST['add_country'])){
        $country = trim(htmlspecialchars($_POST['country']));
        if($country == ''){
            echo "<script>window.location='index.php?page=4'</script>";
            return;
        }
        $ins = "insert into countries(country) values('$country')";
        $link = connect();
        mysqli_query($link, $ins);
        $msg = "<span class='alert alert-success'>Country added</span>";
    }
    if(isset($_POST['del_country'])){
        foreach($_POST['indexes'] as $id){
            $del = "delete from countries where id=$id";
            mysqli_query(connect(), $del);
        }
        $msg = "<span class='alert alert-success'>Country deleted</span>";
    }

    if(isset($_POST['add_city'])){
        $city = trim(htmlspecialchars($_POST['city']));
        $country_id = $_POST['country_id'];
        if($city == ''){
            echo "<script>window.location='index.php?page=4'</script>";
            return;
        }
        $ins = "insert into cities(city, country_id) values('$city', $country_id)";
        $link = connect();
        mysqli_query($link, $ins);
        $msg_city = "<span class='alert alert-success'>City added</span>";
    }
    if(isset($_POST['del_city'])){
        foreach($_POST['indexes'] as $id){
            $del = "delete from cities where id=$id";
            mysqli_query(connect(), $del);
        }
        $msg_city = "<span class='alert alert-success'>City deleted</span>";
    }
?>
<h1>Admin</h1>
<div class="row">
    <div class="col-md-6">
        <!-- section A: for form countries -->
        <div class="panel panel-primary">
            <form action="index.php?page=4" method="post">
            <div class="panel-heading">
                <h3>Form countries</h3>
            </div>
            <div class="panel-body">
                <?php
                    $link = connect();
                    $sel = 'select * from countries';
                    $countries_res = mysqli_query($link, $sel);
                ?>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>country</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($countries_res)):?>
                    <tr>
                        <td><?=$row['id']?></td>    
                        <td><?php echo $row['country']?></td>
                        <td>
                            <input type="checkbox" name="indexes[]" value="<?=$row['id']?>">
                        </td>
                    </tr>
                    <? endwhile;?>
                </tbody>
                </table>
                <div class="form-group">
                    <label>
                        Country Title
                        <input class="form-control" type="text" name="country">
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" name="add_country" type="submit">Add</button>
                <button class="btn btn-danger" name="del_country" type="submit">Delete</button>
                <?= $msg?:''?>
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <!-- section B: for form cities -->
        <div class="panel panel-succes">
            <form action="index.php?page=4" method="post">
            <div class="panel-heading">
                <h3>Form Cities</h3>
            </div>
            <div class="panel-body">
                <?php
                    $link = connect();
                    $sel_table = 'select cities.id, cities.city, countries.country from cities, countries where cities.country_id = countries.id';
                    $sel_country = "select * from countries";
                    $cities_res = mysqli_query($link, $sel_table);
                    $country_res = mysqli_query($link, $sel_country);
                ?>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>city</th>
                        <th>country</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($cities_res)):?>
                    <tr>
                        <td><?=$row['id']?></td>  
                        <td><?=$row['city']?></td>  
                        <td><?php echo $row['country']?></td>
                        <td>
                            <input type="checkbox" name="indexes[]" value="<?=$row['id']?>">
                        </td>
                    </tr>
                    <? endwhile;?>
                </tbody>
                </table>
                <div class="form-group">
                    <select name="country_id" class="form-control">
                        <?php while ($row = mysqli_fetch_array($country_res)):?>
                        <option value="<?=$row['id']?>"><?=$row['country']?></option>
                        <? endwhile;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        City Title
                        <input class="form-control" type="text" name="city">
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" name="add_city" type="submit">Add</button>
                <button class="btn btn-danger" name="del_city" type="submit">Delete</button>
                <?= $msg_city?:''?>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-6">
    <!-- section C: for form hotels -->
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3>Form Hotels</h3>
        </div>
        <div class="panel-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptas laudantium eligendi accusantium officia maxime enim delectus inventore. Cumque saepe vero architecto soluta vel? Aperiam, deserunt nulla dolor velit rerum maiores officia dolore nam enim reiciendis reprehenderit. Provident, reprehenderit quibusdam?
        </div>
        <div class="panel-footer">
            <button class="btn btn-warning">Add</button>
            <button class="btn btn-primary">Delete</button>
        </div>
    </div>
</div>
<div class="col-md-6">
    <!-- section D: for form images -->
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3>Form Images</h3>
        </div>
        <div class="panel-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum voluptas laudantium eligendi accusantium officia maxime enim delectus inventore. Cumque saepe vero architecto soluta vel? Aperiam, deserunt nulla dolor velit rerum maiores officia dolore nam enim reiciendis reprehenderit. Provident, reprehenderit quibusdam?
        </div>
        <div class="panel-footer">
            <button class="btn btn-warning">Add</button>
            <button class="btn btn-primary">Delete</button>
        </div>
    </div>
</div>
</div>