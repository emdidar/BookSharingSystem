
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="vCity">
                            <option value=""></option>
                            <?php
                            $query="select distinct vCity from tblogin where vUserType='carrier' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                while($result=$selectData->fetch_assoc())
                                {
                            ?>
                                <option value="<?php echo $result['vCity']; ?>"><?php echo $result['vCity']; ?></option>
                            <?php
                                }
                            }
                        ?>
                        </select>
                    </div>
                </div>