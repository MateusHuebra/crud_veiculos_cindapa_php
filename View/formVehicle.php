    <div>
        <input id="chassis_number" name="chassis_number" type="text" maxlength="17" placeholder="Nº Chassi"
        value="<?php echo (isset($vehicle['chassis_number']))?($vehicle['chassis_number']):''; ?>" />
    </div>
    <div>
        <input id="brand" name="brand" type="text" maxlength="32" placeholder="Marca"
        value="<?php echo (isset($vehicle['brand']))?($vehicle['brand']):''; ?>" />
    </div>
    <div>
        <input id="model" name="model" type="text" maxlength="32" placeholder="Modelo"
        value="<?php echo (isset($vehicle['model']))?($vehicle['model']):''; ?>" />
    </div>
    <div>
        <input id="year" name="year" type="number" placeholder="Ano"
        value="<?php echo (isset($vehicle['year']))?($vehicle['year']):''; ?>" />
    </div>
    <div>
        <input id="plate" name="plate" type="text" maxlength="7" placeholder="Placa"
        value="<?php echo (isset($vehicle['plate']))?($vehicle['plate']):''; ?>" />
    </div>

    <div style="margin-top: 15px; margin-bottom: 8px;">
        <label style="vertical-align: middle;">Características | </label>
        <a style="font-size: small;" href="#" onclick="clearCharacteristics()">Limpar</a>
        <div style="margin-top: 8px;">
            <input type="radio" name="characteristicsModel" id="sport" value="sport" 
            <?php echo (isset($vehicle['characteristics']) && in_array('sport', $vehicle['characteristics']))?'checked':''; ?>>
            <label for="sport">
                Esporte
            </label>
        </div>
        <div>
            <input type="radio" name="characteristicsModel" id="classic" value="classic" 
            <?php echo (isset($vehicle['characteristics']) && in_array('classic', $vehicle['characteristics']))?'checked':''; ?>>
            <label for="classic">
                Clássico
            </label>
        </div>

        <div style="margin-top: 8px;">
            <input type="radio" name="characteristicsType" id="turbo" value="turbo" 
            <?php echo (isset($vehicle['characteristics']) && in_array('turbo', $vehicle['characteristics']))?'checked':''; ?>>
            <label for="turbo">
                Turbo
            </label>
        </div>
        <div>
            <input type="radio" name="characteristicsType" id="economic" value="economic" 
            <?php echo (isset($vehicle['characteristics']) && in_array('economic', $vehicle['characteristics']))?'checked':''; ?>>
            <label for="economic">
                Econômico
            </label>
        </div>

        <div style="margin-top: 8px;">
            <input type="radio" name="characteristicsDistance" id="city" value="city" 
            <?php echo (isset($vehicle['characteristics']) && in_array('city', $vehicle['characteristics']))?'checked':''; ?>>
            <label for="city">
                Para cidade
            </label>
        </div>
        <div>
            <input type="radio" name="characteristicsDistance" id="distant_travels" value="distant_travels" 
            <?php echo (isset($vehicle['characteristics']) && in_array('distant_travels', $vehicle['characteristics']))?'checked':''; ?>>
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