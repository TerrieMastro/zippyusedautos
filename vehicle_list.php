<?php include('../view/header.php'); ?>


<h1 class="list-title">Zippy Used Autos</h1>
<section class="container">
    
    <section class="filter">
        <form action="." method="get">
            <input type="hidden" name="action" value="list_vehicles">
            <table class="filter-table">
                <tr>
                    <td>
                        <h3>Order By:</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="." method="get">
                            <input type="hidden" name="action" value="list_vehicles">
                            <select name="order" required>
                                <option value="0">price</option>
                                <option value="1">year</option>
                            </select>
                            <button>Go</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Filter By:</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Make:</p>
                    </td>
                    <td>
                        <select name="make_id" required>
                            <option value="0">View All</option>
                            <?php foreach ($makes as $make) : ?>
                            <?php if($make_id == $make['makeID']){ ?>
                                <option value="<?= $make['makeID'] ?>" selected>
                            <?php } else { ?>
                                <option value="<?= $make['makeID'] ?>">
                            <?php } ?>
                                    <?= $make['makeName'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <p>Class:</p>
                    </td>
                    <td>
                        <select name="class_id" required>
                            <option value="0">View All</option>
                            <?php foreach ($classes as $class) : ?>
                            <?php if($class_id == $class['classID']){ ?>
                                <option value="<?= $class['classID'] ?>" selected>
                            <?php } else { ?>
                                <option value="<?= $class['classID'] ?>">
                            <?php } ?>
                                    <?= $class['className'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <p>Type:</p>
                    </td>
                    <td>
                        <select name="type_id" required>
                            <option value="0">View All</option>
                            <?php foreach ($types as $type) : ?>
                            <?php if($type_id == $type['typeID']){ ?>
                                <option value="<?= $type['typeID'] ?>" selected>
                            <?php } else { ?>
                                <option value="<?= $type['typeID'] ?>">
                            <?php } ?>
                                    <?= $type['typeName'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <button class="add-button bold">Go</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <section class="list-table">
        <?php if($vehicles){ ?>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Model</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Class</th>
                </tr>
                <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td>
                        <?= $vehicle['year'] ?>
                    </td>
                    <td>
                        $<?= $vehicle['price'] ?>
                    </td>
                    <td>
                        <?= $vehicle['model'] ?>
                    </td>
                    <td>
                        <?= get_make_name($vehicle['makeID']) ?>
                    </td>
                    <td>
                        <?= get_type_name($vehicle['typeID']) ?>
                    </td>
                    <td>
                        <?= get_class_name($vehicle['classID']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <p>No vehicles exist in list</p>
        <?php } ?>
    </section>
    
</section>

<?php include('../view/footer.php'); ?>