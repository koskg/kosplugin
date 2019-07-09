<?php

/**
 * Defined routes for plugin kosplugin
 */
OW::getRouter()->addRoute(new OW_Route('kosplugin-index', 'kosplugin', 'KOSPLUGIN_CTRL_Test', 'index'));
OW::getRouter()->addRoute(new OW_Route('kosplugin-form', 'kosplugin', 'KOSPLUGIN_CTRL_Test', 'form'));
OW::getRouter()->addRoute(new OW_Route('kosplugin-data', 'kosplugin/data', 'KOSPLUGIN_CTRL_Data', 'index'));



