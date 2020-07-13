<?php

namespace App\Components;

use App\Models\File;
use FileSystem;
use Session;
use Storage;

class FilesComponent {

    private static function checkPath($path) {

        $directories = explode('/', $path);
        $fullpath = '';

        foreach ($directories as $directory) {

            $fullpath .= $directory;

            if (!Storage::has($fullpath))
                Storage::makeDirectory($fullpath);

            $fullpath .= '/';

        }

        return $fullpath;
    }

    private static function checkFilename($file, $path) {

        $number = 1;

        $pathinfo = pathinfo($file->getClientOriginalName());
        $filename = $pathinfo['filename'];
        $extension = $pathinfo['extension'];

        // Adiciona um sufixo ao nome dos arquivos que possuem um arquivo já
        // salvo com o mesmo nome
        while (true) {
            if (Storage::has($path . $filename . '.' . $extension)) {
                $filename = $pathinfo['filename'] . ' (' . $number . ')';
                $number++;
            } else break;
        }

        return $filename . '.' . $extension;
    }

    public static function saveRecord($fileData) {

        $fileRecord = new File();
        $fileRecord->owner_id = 2;
        $fileRecord->filename = $fileData['basename'];
        $fileRecord->extension = $fileData['extension'];
        $fileRecord->filepath = $fileData['dirname'];

        if (!$fileRecord->save())
            throw new Exception('Erro ao salvar registro do arquivo');

        return $fileRecord->id;
    }

    public static function saveFile($file, $directory) {

        $path = self::checkPath($directory);

        $filename = self::checkFilename($file, $path);

        $file->storeAs($path, $filename);

        $fileData = pathinfo($path . $filename);

        $fileRecordId = self::saveRecord($fileData);

        $fileData['file_id'] = $fileRecordId;

        return $fileData;
    }

    public static function saveFileWithName($file, $directory, $fileName) {

        $path = self::checkPath($directory);

        $file->storeAs($path, $fileName);

        $fileData = pathinfo($path . $fileName);

        $fileRecordId = self::saveRecord($fileData);

        $fileData['file_id'] = $fileRecordId;

        return $fileData;
    }

    public static function saveFiles(array $files, $directory) {

        $savedFiles = [];

        foreach ($files as $file) {
            $savedFiles[] = self::saveFile($file, $directory);
        }

        return $savedFiles;
    }

    private static function removeFile($fileId, $filename, $directory) {

        $filepath = $directory . '/' . $filename;

        if (!Storage::has($filepath))
            throw new \Exception('Arquivo não encontrado', 404);

        $removedDirectory = $directory . '/' . 'removed';

        if (!Storage::has($removedDirectory))
            Storage::makeDirectory($removedDirectory);

        $removedFilepath = $removedDirectory . '/' . date('YmdHis') . '_' . $filename;

        if (!Storage::move($filepath, $removedFilepath))
            throw new \Exception('Erro ao remover arquivo', 500);

        File::where('id', $fileId)
            ->update([
                'removed' => 1,
                'trash_path' => $removedFilepath,
            ]);

        return $fileId;
    }

    public static function removeFileByFilenameAndDirectory($filename, $directory) {

        $file = File::where('filename', $filename)
            ->where('filepath', $directory)
            ->where('removed', 0)
            ->first();

        if (empty($file))
            throw new \Exception('Registro do arquivo não encontrado', 404);

        return self::removeFile($file->id, $filename, $directory);
    }

    public static function removeFileById($fileId) {

        $file = File::find($fileId);

        if (empty($file))
            throw new \Exception('Registro do arquivo não encontrado', 404);

        return self::removeFile($fileId, $file->filename, $file->filepath);
    }

    public static function getFileData($fileId) {

        $file = File::find($fileId);

        if (empty($file))
            return [];

        $fileData = pathinfo($file->filepath . '/' . $file->filename);

        $fileData['file_id'] = $fileId;

        return $fileData;
    }

    public static function duplicateFile($originPath, $targetPath){
        return Storage::copy($originPath, $targetPath);
    }

}

?>
