<?php namespace App\Drive\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Drive\Models\MimesTypes;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class MimesTypesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->melisaMimes();
        $this->realMimes();
        
    }
    
    public function melisaMimes()
    {
        
        MimesTypes::updateOrCreate([
            'name'=>'application/vnd.melisa-apps.folder',
        ], [
            'iconCls'=>'x-fa fa fa-folder'
        ]);
        
        MimesTypes::updateOrCreate([
            'name'=>'application/vnd.melisa-apps.unknown'
        ]);
        
    }
    
    public function realMimes()
    {
        
        MimesTypes::updateOrCreate([
            'name'=>'image/png',
        ], [
            'iconCls'=>'x-fa fa fa-picture-o'
        ]);
        
        MimesTypes::updateOrCreate([
            'name'=>'image/jpeg',
        ], [
            'iconCls'=>'x-fa fa fa-picture-o'
        ]);
        
        MimesTypes::updateOrCreate([
            'name'=>'application/pdf',
        ], [
            'iconCls'=>'x-fa fa fa-file-pdf-o'
        ]);
        
        MimesTypes::updateOrCreate([
            'name'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ], [
            'iconCls'=>'x-fa fa fa-file-text'
        ]);
        
    }
    
}
