<?php

$files = $_FILES;

if ($files) {
    foreach ($files as $file) {
        if (is_array($file['name'])) {
            $lenght = count($file['name']);
            for ($i = 0; $i < $lenght; $i++) {
                if ($file['UPLOAD_ERR_OK'][$i]) {
                    echo 'Значение: 0; Ошибок не возникло, файл был успешно загружен на сервер.';
                    exit;
                }
                    if ($file['UPLOAD_ERR_INI_SIZE'][$i]) {
                        echo 'Значение: 1; Размер принятого файла превысил максимально допустимый размер, который задан директивой';
                        exit;
                        }
                    if ($file['UPLOAD_ERR_FORM_SIZE'][$i]) {
                        echo 'Значение: 2; Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.';
                        exit;
                    }
                    if ($file['UPLOAD_ERR_PARTIAL'][$i]) {
                        echo 'Значение: 3; Загружаемый файл был получен только частично.';
                        exit;
                    }
                    if ($file['UPLOAD_ERR_NO_FILE'][$i]) {
                        echo 'Значение: 4; Файл не был загружен.';
                        exit;
                    }
                    if ($file['UPLOAD_ERR_NO_TMP_DIR'][$i]) {
                        echo 'Значение: 6; Отсутствует временная папка.';
                        exit;
                    }
                    if ($file['UPLOAD_ERR_CANT_WRITE'][$i]) {
                        echo 'Значение: 7; Не удалось записать файл на диск.';
                        exit;
                    }
                    if ($file['UPLOAD_ERR_EXTENSION'][$i]) {
                        echo 'Значение: 8; Модуль PHP остановил загрузку файла. PHP не предоставляет способа определить, какой модуль остановил загрузку файла; в этом может помочь просмотр списка загруженных модулей с помощью';
                        exit;
                    }

                $fileTmp = $file['tmp_name'][$i];
                $fileName = $file['name'][$i];
                move_uploaded_file($fileTmp, 'files/' . $fileName);
            }
        } else {
            if ($file['error']) {
                echo 'error';
                exit;
            }
            $fileTmp = $file['tmp_name'];
            $fileName = $file['name'];
            move_uploaded_file($fileTmp, 'files/' . $fileName);
        }
    }
}