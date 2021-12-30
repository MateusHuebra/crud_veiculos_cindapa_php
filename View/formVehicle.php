    <div>
        <input id="chassis_number" name="chassis_number" type="text" maxlength="17" placeholder="Nº Chassi"
        value="<?php echo (!is_null($vehicle->getChassisNumber()))?($vehicle->getChassisNumber()):''; ?>" />
        <div class="alert"><span>
            <?php
                if(isset($errors['chassis_number'])) {
                    echo $errors['chassis_number'];
                }
            ?>
        </span></div>
    </div>
    <div>
        <input id="brand" name="brand" type="text" maxlength="32" placeholder="Marca"
        value="<?php echo (!is_null($vehicle->getBrand()))?($vehicle->getBrand()):''; ?>" />
        <div class="alert"><span>
            <?php
                if(isset($errors['brand'])) {
                    echo $errors['brand'];
                }
            ?>
        </span></div>
    </div>
    <div>
        <input id="model" name="model" type="text" maxlength="32" placeholder="Modelo"
        value="<?php echo (!is_null($vehicle->getModel()))?($vehicle->getModel()):''; ?>" />
        <div class="alert"><span>
            <?php
                if(isset($errors['model'])) {
                    echo $errors['model'];
                }
            ?>
        </span></div>
    </div>
    <div>
        <input id="year" name="year" type="number" placeholder="Ano"
        value="<?php echo (!is_null($vehicle->getYear()))?($vehicle->getYear()):''; ?>" />
        <div class="alert"><span>
            <?php
                if(isset($errors['year'])) {
                    echo $errors['year'];
                }
            ?>
        </span></div>
    </div>
    <div>
        <input id="plate" name="plate" type="text" maxlength="7" placeholder="Placa"
        value="<?php echo (!is_null($vehicle->getPlate()))?($vehicle->getPlate()):''; ?>" />
        <div class="alert"><span>
            <?php
                if(isset($errors['plate'])) {
                    echo $errors['plate'];
                }
            ?>
        </span></div>
    </div>

    <div style="margin-top: 15px; margin-bottom: 8px;">
        <label style="vertical-align: middle;">Características | </label>
        <a style="font-size: small;" href="#" onclick="clearCharacteristics()">Limpar</a>
        <div class="alert"><span>
            <?php
                if(isset($errors['characteristics'])) {
                    echo $errors['characteristics'];
                }
            ?>
        </span></div>
        <div style="margin-top: 8px;">
            <input type="radio" name="characteristicsModel" id="sport" value="sport" 
            <?php echo ($vehicle->hasCharacteristic('sport'))?'checked':''; ?>>
            <label for="sport">
                Esporte
            </label>
        </div>
        <div>
            <input type="radio" name="characteristicsModel" id="classic" value="classic" 
            <?php echo ($vehicle->hasCharacteristic('classic'))?'checked':''; ?>>
            <label for="classic">
                Clássico
            </label>
        </div>

        <div style="margin-top: 8px;">
            <input type="radio" name="characteristicsType" id="turbo" value="turbo" 
            <?php echo ($vehicle->hasCharacteristic('turbo'))?'checked':''; ?>>
            <label for="turbo">
                Turbo
            </label>
        </div>
        <div>
            <input type="radio" name="characteristicsType" id="economic" value="economic" 
            <?php echo ($vehicle->hasCharacteristic('economic'))?'checked':''; ?>>
            <label for="economic">
                Econômico
            </label>
        </div>

        <div style="margin-top: 8px;">
            <input type="radio" name="characteristicsDistance" id="city" value="city" 
            <?php echo ($vehicle->hasCharacteristic('city'))?'checked':''; ?>>
            <label for="city">
                Para cidade
            </label>
        </div>
        <div>
            <input type="radio" name="characteristicsDistance" id="distant_travels" value="distant_travels" 
            <?php echo ($vehicle->hasCharacteristic('distant_travels'))?'checked':''; ?>>
            <label for="distant_travels">
                Para longas viagens
            </label>
        </div>
    </div>

    <div>
        <input onclick="goToHome()" name='back' type='button' value='Cancelar e voltar' />
        <input name='submit' type='submit' value='Salvar' />
    </div>
</form>
    </div>
    
</body>
</html>