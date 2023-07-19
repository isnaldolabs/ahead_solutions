<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'App';
$route['404_override'] = 'Errors/ct_error_404';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Errors pages
| Página 404 está presente na lista abaixo por default, porém, a execução
| é realizada através da route '404_override'.
| -------------------------------------------------------------------------
*/
$route['404_error'] = 'Errors/ct_error_404';
$route['500_error'] = 'Errors/ct_error_500';
$route['503_error'] = 'Errors/ct_error_503';
$route['505_error'] = 'Errors/ct_error_505';

define('RT_FILE_NOT_FOUND','rt-file-not-found');
$route[RT_FILE_NOT_FOUND] = 'Errors/ct_error_file_not_found';

/*
| -------------------------------------------------------------------------
| Support
|   Help Center Pages
| -------------------------------------------------------------------------
*/
define('RT_SUPPORT_HC','rt-support-hc');
$route[RT_SUPPORT_HC] = 'support/Support/ct_help_center';

define('RT_SUPPORT_HC_PREPARE_SEASONS','rt-support-hc-prepare-seasons');
$route[RT_SUPPORT_HC_PREPARE_SEASONS] = 'support/Support/ct_hc_prepare_seasons';

/*
| -------------------------------------------------------------------------
| authorization
| -------------------------------------------------------------------------
*/
// login - signin
define('RT_SIGNIN','rt-signin');
$route[RT_SIGNIN] = 'authorizations/AuSignin';

define('RT_SIGNIN_01','rt-signin-show');
$route[RT_SIGNIN_01] = 'authorizations/AuSignin/ct_signin_show';

define('RT_SIGNIN_02','rt-signin-check');
$route[RT_SIGNIN_02] = 'authorizations/AuSignin/ct_signin_check';

// logout
define('RT_SIGNOUT','rt-signout');
$route[RT_SIGNOUT] = 'authorizations/AuSignout';

// login - forgot
define('RT_FORGOT','rt-forgot');
$route[RT_FORGOT] = 'authorizations/AuForgot';

define('RT_FORGOT_01','rt-forgot-show');
$route[RT_FORGOT_01] = 'authorizations/AuForgot/ct_forgot_show';

define('RT_FORGOT_02','rt-forgot-send');
$route[RT_FORGOT_02] = 'authorizations/AuForgot/ct_forgot_send';

define('RT_FORGOT_03','rt-forgot-sent');
$route[RT_FORGOT_03] = 'authorizations/AuForgot/ct_forgot_sent';

// reset - password
define('RT_RESET','rt-reset');
$route[RT_RESET.'/(:any)/(:num)'] = 'authorizations/AuReset/ct_reset_show/$1/$2';

define('RT_RESET_01','rt-reset-check');
$route[RT_RESET_01] = 'authorizations/AuReset/ct_reset_check';

define('RT_RESET_02','rt-reset-password-done');
$route[RT_RESET_02] = 'authorizations/AuReset/ct_reset_done';

define('RT_RESET_03','rt-reset-link-invalid');
$route[RT_RESET_03] = 'authorizations/AuReset/ct_reset_link_invalid';

/*
| -------------------------------------------------------------------------
| SECURITY pages
| -------------------------------------------------------------------------
*/

/* licenses pages */
define('RT_SECURITY_LICENSES','rt-security-licenses');
$route[RT_SECURITY_LICENSES]           = 'security/Licenses';
$route[RT_SECURITY_LICENSES.'/(:num)'] = 'security/Licenses';

define('RT_SECURITY_LICENSES_VW_INS','rt-security-licenses-vw-ins');
$route[RT_SECURITY_LICENSES_VW_INS] = 'security/Licenses/ct_vw_insert';

define('RT_SECURITY_LICENSES_DB_INS','rt-security-licenses-db-ins');
$route[RT_SECURITY_LICENSES_DB_INS] = 'security/Licenses/ct_db_insert';

define('RT_SECURITY_LICENSES_VW_UPD','rt-security-licenses-vw-upd');
$route[RT_SECURITY_LICENSES_VW_UPD.'/(:any)'] = 'security/Licenses/ct_vw_update/$1';

define('RT_SECURITY_LICENSES_DB_UPD','rt-security-licenses-db-upd');
$route[RT_SECURITY_LICENSES_DB_UPD.'/(:any)'] = 'security/Licenses/ct_db_update/$1';

define('RT_SECURITY_LICENSES_DB_DEL','rt-security-licenses-db-del');
$route[RT_SECURITY_LICENSES_DB_DEL.'/(:any)'] = 'security/Licenses/ct_db_delete/$1';

/* users pages */
define('RT_SECURITY_USERS','rt-security-users');
$route[RT_SECURITY_USERS]           = 'security/Users';
$route[RT_SECURITY_USERS.'/(:num)'] = 'security/Users';

define('RT_SECURITY_USERS_VW_INS','rt-security-users-vw-ins');
$route[RT_SECURITY_USERS_VW_INS] = 'security/Users/ct_vw_insert';

define('RT_SECURITY_USERS_DB_INS','rt-security-users-db-ins');
$route[RT_SECURITY_USERS_DB_INS] = 'security/Users/ct_db_insert';

define('RT_SECURITY_USERS_VW_UPD','rt-security-users-vw-upd');
$route[RT_SECURITY_USERS_VW_UPD.'/(:any)'] = 'security/Users/ct_vw_update/$1';

define('RT_SECURITY_USERS_DB_UPD','rt-security-users-db-upd');
$route[RT_SECURITY_USERS_DB_UPD.'/(:any)'] = 'security/Users/ct_db_update/$1';

define('RT_SECURITY_USERS_DB_DEL','rt-security-users-db-del');
$route[RT_SECURITY_USERS_DB_DEL.'/(:any)'] = 'security/Users/ct_db_delete/$1';

define('RT_SECURITY_USERS_DB_UPD_LICENSE', 'rt-security-users-db-upd-license');
$route[RT_SECURITY_USERS_DB_UPD_LICENSE.'/(:num)/(:num)'] = 'security/Users/ct_db_update_license/$1/$2';

/* users seasons updates */
define('RT_SECURITY_USERS_DB_UPD_SEASONS','rt-admin-users-db-upd-seasons');
$route[RT_SECURITY_USERS_DB_UPD_SEASONS.'/(:num)/(:num)'] = 'security/Users/ct_db_update_season/$1/$2';

/* users licenses */
define('RT_USERS_LICENSES','rt-users-licenses');
$route[RT_USERS_LICENSES]           = 'security/UsersLicenses';
$route[RT_USERS_LICENSES.'/(:num)'] = 'security/UsersLicenses';

define('RT_USERS_LICENSES_VW_INS','rt-users-licenses-vw-ins');
$route[RT_USERS_LICENSES_VW_INS] = 'security/UsersLicenses/ct_vw_insert';

define('RT_USERS_LICENSES_DB_INS','rt-users-licenses-db-ins');
$route[RT_USERS_LICENSES_DB_INS] = 'security/UsersLicenses/ct_db_insert';

define('RT_USERS_LICENSES_DB_DEL','rt-users-licenses-db-del');
$route[RT_USERS_LICENSES_DB_DEL.'/(:any)'] = "security/UsersLicenses/ct_db_delete/$1";

/*
| -------------------------------------------------------------------------
| ADMIN pages
| -------------------------------------------------------------------------
*/

/* groups pages */
define('RT_ADMIN_GROUPS','rt-admin-groups');
$route[RT_ADMIN_GROUPS]           = 'authorizations/Groups';
$route[RT_ADMIN_GROUPS.'/(:num)'] = 'authorizations/Groups';

define('RT_ADMIN_GROUPS_VW_INS','rt-admin-groups-vw-ins');
$route[RT_ADMIN_GROUPS_VW_INS] = 'authorizations/Groups/ct_vw_insert';

define('RT_ADMIN_GROUPS_DB_INS','rt-admin-groups-db-ins');
$route[RT_ADMIN_GROUPS_DB_INS] = 'authorizations/Groups/ct_db_insert';

define('RT_ADMIN_GROUPS_VW_UPD','rt-admin-groups-vw-upd');
$route[RT_ADMIN_GROUPS_VW_UPD.'/(:any)'] = 'authorizations/Groups/ct_vw_update/$1';

define('RT_ADMIN_GROUPS_DB_UPD','rt-admin-groups-db-upd');
$route[RT_ADMIN_GROUPS_DB_UPD.'/(:any)'] = 'authorizations/Groups/ct_db_update/$1';

define('RT_ADMIN_GROUPS_DB_DEL','rt-admin-groups-db-del');
$route[RT_ADMIN_GROUPS_DB_DEL.'/(:any)'] = 'authorizations/Groups/ct_db_delete/$1';

/* groups config pages */
define('RT_ADMIN_GROUPS_CONFIG','rt-admin-groups-config');
$route[RT_ADMIN_GROUPS_CONFIG]           = 'authorizations/GroupsConfig';
$route[RT_ADMIN_GROUPS_CONFIG.'/(:num)'] = 'authorizations/GroupsConfig';

define('RT_ADMIN_GROUPS_CONFIG_DB_UPD','rt-admin-groups-config-db-upd');
$route[RT_ADMIN_GROUPS_CONFIG_DB_UPD.'/(:any)/(:num)'] = 'authorizations/GroupsConfig/ct_db_update/$1/$2';

/* permissions pages */
define('RT_ADMIN_PERMISSIONS','rt-admin-permissions');
$route[RT_ADMIN_PERMISSIONS]           = 'authorizations/Permissions';
$route[RT_ADMIN_PERMISSIONS.'/(:num)'] = 'authorizations/Permissions';

define('RT_ADMIN_PERMISSIONS_DB_UPD','rt-admin-permissions-db-upd');
$route[RT_ADMIN_PERMISSIONS_DB_UPD.'/(:any)/(:num)'] = 'authorizations/Permissions/ct_db_update/$1/$2';

/*
| -------------------------------------------------------------------------
| PROFILE pages
| -------------------------------------------------------------------------
*/

/* users pages */
define('RT_USER_PROFILE','rt-user-profile');

define('RT_USER_PROFILE_VW_UPD','rt-user-profile-vw-upd');
$route[RT_USER_PROFILE_VW_UPD.'/(:any)'] = 'authorizations/Profile/ct_vw_update/$1';

define('RT_USER_PROFILE_DB_UPD','rt-user-profile-db-upd');
$route[RT_USER_PROFILE_DB_UPD.'/(:any)'] = 'authorizations/Profile/ct_db_update/$1';

/* lines per page */
define('RT_PARAMS_LINES_PAGE','rt-params-lines-page');
$route[RT_PARAMS_LINES_PAGE.'/(:any)/(:any)'] = 'authorizations/Profile/ct_profile_lines_page/$1/$2';

/*
| -------------------------------------------------------------------------
| MAIN pages
| -------------------------------------------------------------------------
*/

define('RT_MAIN_DASH','rt-main-dashboard');
$route[RT_MAIN_DASH] = 'main/Main/ct_main_dashboard';

define('RT_MAIN_PREPARE','rt-main-prepare');
$route[RT_MAIN_PREPARE] = 'main/Main/ct_main_prepare';

define('RT_MAIN_ANALYZE','rt-main-analyze');
$route[RT_MAIN_ANALYZE] = 'main/Main/ct_main_analyze';

define('RT_MAIN_ADMIN','rt-main-admin');
$route[RT_MAIN_ADMIN] = 'main/Main/ct_main_admin';

define('RT_MAIN_SECURITY','rt-main-security');
$route[RT_MAIN_SECURITY] = 'main/Main/ct_main_security';

/*
| -------------------------------------------------------------------------
| PREPARE pages
| -------------------------------------------------------------------------
*/
/* RT_MATH_ANOVA_RATINGS */
define('RT_MATH_ANOVA_RATINGS','rt-math-anova-ratings');
$route[RT_MATH_ANOVA_RATINGS]           = 'prepare/MathAnovaRatings';
$route[RT_MATH_ANOVA_RATINGS.'/(:num)'] = 'prepare/MathAnovaRatings';

define('RT_MATH_ANOVA_RATINGS_VW_UPD','rt-math-anova-ratings-vw-upd');
$route[RT_MATH_ANOVA_RATINGS_VW_UPD.'/(:any)'] = 'prepare/MathAnovaRatings/ct_vw_update/$1';

define('RT_MATH_ANOVA_RATINGS_DB_UPD','rt-math-anova-ratings-db-upd');
$route[RT_MATH_ANOVA_RATINGS_DB_UPD.'/(:any)'] = 'prepare/MathAnovaRatings/ct_db_update/$1';

/* RT_PROTOCOLS_RATINGS */
define('RT_PROTOCOLS_RATINGS','rt-protocols-ratings');
$route[RT_PROTOCOLS_RATINGS]           = 'prepare/ProtocolsRatings';
$route[RT_PROTOCOLS_RATINGS.'/(:num)'] = 'prepare/ProtocolsRatings';

define('RT_PROTOCOLS_RATINGS_VW_UPD','rt-protocols-ratings-vw-upd');
$route[RT_PROTOCOLS_RATINGS_VW_UPD.'/(:any)'] = 'prepare/ProtocolsRatings/ct_vw_update/$1';

define('RT_PROTOCOLS_RATINGS_DB_UPD','rt-protocols-ratings-db-upd');
$route[RT_PROTOCOLS_RATINGS_DB_UPD.'/(:any)'] = 'prepare/ProtocolsRatings/ct_db_update/$1';

/* RT_BUSINESS_UNITS */
define('RT_BUSINESS_UNITS','rt-business-units');
$route[RT_BUSINESS_UNITS]           = 'prepare/BusinessUnits';
$route[RT_BUSINESS_UNITS.'/(:num)'] = 'prepare/BusinessUnits';

define('RT_BUSINESS_UNITS_VW_INS','rt-business-units-vw-ins');
$route[RT_BUSINESS_UNITS_VW_INS] = 'prepare/BusinessUnits/ct_vw_insert';

define('RT_BUSINESS_UNITS_DB_INS','rt-business-units-db-ins');
$route[RT_BUSINESS_UNITS_DB_INS] = 'prepare/BusinessUnits/ct_db_insert';

define('RT_BUSINESS_UNITS_VW_UPD','rt-business-units-vw-upd');
$route[RT_BUSINESS_UNITS_VW_UPD.'/(:any)'] = 'prepare/BusinessUnits/ct_vw_update/$1';

define('RT_BUSINESS_UNITS_DB_UPD','rt-business-units-db-upd');
$route[RT_BUSINESS_UNITS_DB_UPD.'/(:any)'] = 'prepare/BusinessUnits/ct_db_update/$1';

define('RT_BUSINESS_UNITS_DB_DEL','rt-business-units-db-del');
$route[RT_BUSINESS_UNITS_DB_DEL.'/(:any)'] = 'prepare/BusinessUnits/ct_db_delete/$1';

/* SEASONS */
define('RT_SEASONS','rt-seasons');
$route[RT_SEASONS]           = 'prepare/Seasons';
$route[RT_SEASONS.'/(:num)'] = 'prepare/Seasons';

define('RT_SEASONS_VW_INS','rt-seasons-vw-ins');
$route[RT_SEASONS_VW_INS] = 'prepare/Seasons/ct_vw_insert';

define('RT_SEASONS_DB_INS','rt-seasons-db-ins');
$route[RT_SEASONS_DB_INS] = 'prepare/Seasons/ct_db_insert';

define('RT_SEASONS_VW_UPD','rt-seasons-vw-upd');
$route[RT_SEASONS_VW_UPD.'/(:any)'] = "prepare/Seasons/ct_vw_update/$1";

define('RT_SEASONS_DB_UPD','rt-seasons-db-upd');
$route[RT_SEASONS_DB_UPD.'/(:any)'] = "prepare/Seasons/ct_db_update/$1";

define('RT_SEASONS_DB_DEL','rt-seasons-db-del');
$route[RT_SEASONS_DB_DEL.'/(:any)'] = "prepare/Seasons/ct_db_delete/$1";

/* ENVIRONMENTS OF PRODUCTION */
define('RT_ENVIRONMENTS','rt-environments');
$route[RT_ENVIRONMENTS]           = 'prepare/Environments';
$route[RT_ENVIRONMENTS.'/(:num)'] = 'prepare/Environments';

define('RT_ENVIRONMENTS_VW_INS','rt-environments-vw-ins');
$route[RT_ENVIRONMENTS_VW_INS] = 'prepare/Environments/ct_vw_insert';

define('RT_ENVIRONMENTS_DB_INS','rt-environments-db-ins');
$route[RT_ENVIRONMENTS_DB_INS] = 'prepare/Environments/ct_db_insert';

define('RT_ENVIRONMENTS_VW_UPD','rt-environments-vw-upd');
$route[RT_ENVIRONMENTS_VW_UPD.'/(:any)'] = "prepare/Environments/ct_vw_update/$1";

define('RT_ENVIRONMENTS_DB_UPD','rt-environments-db-upd');
$route[RT_ENVIRONMENTS_DB_UPD.'/(:any)'] = "prepare/Environments/ct_db_update/$1";

define('RT_ENVIRONMENTS_DB_DEL','rt-environments-db-del');
$route[RT_ENVIRONMENTS_DB_DEL.'/(:any)'] = "prepare/Environments/ct_db_delete/$1";

/* SOILS */
define('RT_SOILS','rt-soils');
$route[RT_SOILS]           = 'prepare/Soils';
$route[RT_SOILS.'/(:num)'] = 'prepare/Soils';

define('RT_SOILS_VW_INS','rt-soils-vw-ins');
$route[RT_SOILS_VW_INS] = 'prepare/Soils/ct_vw_insert';

define('RT_SOILS_DB_INS','rt-soils-db-ins');
$route[RT_SOILS_DB_INS] = 'prepare/Soils/ct_db_insert';

define('RT_SOILS_VW_UPD','rt-soils-vw-upd');
$route[RT_SOILS_VW_UPD.'/(:any)'] = "prepare/Soils/ct_vw_update/$1";

define('RT_SOILS_DB_UPD','rt-soils-db-upd');
$route[RT_SOILS_DB_UPD.'/(:any)'] = "prepare/Soils/ct_db_update/$1";

define('RT_SOILS_DB_DEL','rt-soils-db-del');
$route[RT_SOILS_DB_DEL.'/(:any)'] = "prepare/Soils/ct_db_delete/$1";

/* CUTTINGS */
define('RT_CUTTINGS','rt-cuttings');
$route[RT_CUTTINGS]           = 'prepare/Cuttings';
$route[RT_CUTTINGS.'/(:num)'] = 'prepare/Cuttings';

define('RT_CUTTINGS_VW_INS','rt-cuttings-vw-ins');
$route[RT_CUTTINGS_VW_INS] = 'prepare/Cuttings/ct_vw_insert';

define('RT_CUTTINGS_DB_INS','rt-cuttings-db-ins');
$route[RT_CUTTINGS_DB_INS] = 'prepare/Cuttings/ct_db_insert';

define('RT_CUTTINGS_VW_UPD','rt-cuttings-vw-upd');
$route[RT_CUTTINGS_VW_UPD.'/(:any)'] = "prepare/Cuttings/ct_vw_update/$1";

define('RT_CUTTINGS_DB_UPD','rt-cuttings-db-upd');
$route[RT_CUTTINGS_DB_UPD.'/(:any)'] = "prepare/Cuttings/ct_db_update/$1";

define('RT_CUTTINGS_DB_DEL','rt-cuttings-db-del');
$route[RT_CUTTINGS_DB_DEL.'/(:any)'] = "prepare/Cuttings/ct_db_delete/$1";

/* CURRENCIES */
define('RT_CURRENCIES','rt-currencies');
$route[RT_CURRENCIES]           = 'prepare/Currencies';
$route[RT_CURRENCIES.'/(:num)'] = 'prepare/Currencies';

define('RT_CURRENCIES_VW_INS','rt-currencies-vw-ins');
$route[RT_CURRENCIES_VW_INS] = 'prepare/Currencies/ct_vw_insert';

define('RT_CURRENCIES_DB_INS','rt-currencies-db-ins');
$route[RT_CURRENCIES_DB_INS] = 'prepare/Currencies/ct_db_insert';

define('RT_CURRENCIES_VW_UPD','rt-currencies-vw-upd');
$route[RT_CURRENCIES_VW_UPD.'/(:any)'] = "prepare/Currencies/ct_vw_update/$1";

define('RT_CURRENCIES_DB_UPD','rt-currencies-db-upd');
$route[RT_CURRENCIES_DB_UPD.'/(:any)'] = "prepare/Currencies/ct_db_update/$1";

define('RT_CURRENCIES_DB_DEL','rt-currencies-db-del');
$route[RT_CURRENCIES_DB_DEL.'/(:any)'] = "prepare/Currencies/ct_db_delete/$1";

/* CURRENCIES_RATES */
define('RT_CURRENCIES_RATES','rt-currencies-rates');
$route[RT_CURRENCIES_RATES]           = 'prepare/CurrenciesRates';
$route[RT_CURRENCIES_RATES.'/(:num)'] = 'prepare/CurrenciesRates';

define('RT_CURRENCIES_RATES_VW_INS','rt-currencies-rates-vw-ins');
$route[RT_CURRENCIES_RATES_VW_INS] = 'prepare/CurrenciesRates/ct_vw_insert';

define('RT_CURRENCIES_RATES_DB_INS','rt-currencies-rates-db-ins');
$route[RT_CURRENCIES_RATES_DB_INS] = 'prepare/CurrenciesRates/ct_db_insert';

define('RT_CURRENCIES_RATES_VW_UPD','rt-currencies-rates-vw-upd');
$route[RT_CURRENCIES_RATES_VW_UPD.'/(:any)'] = "prepare/CurrenciesRates/ct_vw_update/$1";

define('RT_CURRENCIES_RATES_DB_UPD','rt-currencies-rates-db-upd');
$route[RT_CURRENCIES_RATES_DB_UPD.'/(:any)'] = "prepare/CurrenciesRates/ct_db_update/$1";

define('RT_CURRENCIES_RATES_DB_DEL','rt-currencies-rates-db-del');
$route[RT_CURRENCIES_RATES_DB_DEL.'/(:any)'] = "prepare/CurrenciesRates/ct_db_delete/$1";

/* RESEARCH_LINES */
define('RT_RESEARCH_LINES','rt-research-lines');
$route[RT_RESEARCH_LINES]           = 'prepare/ResearchLines';
$route[RT_RESEARCH_LINES.'/(:num)'] = 'prepare/ResearchLines';

define('RT_RESEARCH_LINES_VW_INS','rt-research-lines-vw-ins');
$route[RT_RESEARCH_LINES_VW_INS] = 'prepare/ResearchLines/ct_vw_insert';

define('RT_RESEARCH_LINES_DB_INS','rt-research-lines-db-ins');
$route[RT_RESEARCH_LINES_DB_INS] = 'prepare/ResearchLines/ct_db_insert';

define('RT_RESEARCH_LINES_VW_UPD','rt-research-lines-vw-upd');
$route[RT_RESEARCH_LINES_VW_UPD.'/(:any)'] = "prepare/ResearchLines/ct_vw_update/$1";

define('RT_RESEARCH_LINES_DB_UPD','rt-research-lines-db-upd');
$route[RT_RESEARCH_LINES_DB_UPD.'/(:any)'] = "prepare/ResearchLines/ct_db_update/$1";

define('RT_RESEARCH_LINES_DB_DEL','rt-research-lines-db-del');
$route[RT_RESEARCH_LINES_DB_DEL.'/(:any)'] = "prepare/ResearchLines/ct_db_delete/$1";

/* RESEARCH_SUBLINES */
define('RT_RESEARCH_SUBLINES','rt-research-sublines');
$route[RT_RESEARCH_SUBLINES]           = 'prepare/ResearchSubLines';
$route[RT_RESEARCH_SUBLINES.'/(:num)'] = 'prepare/ResearchSubLines';

define('RT_RESEARCH_SUBLINES_VW_INS','rt-research-sublines-vw-ins');
$route[RT_RESEARCH_SUBLINES_VW_INS] = 'prepare/ResearchSubLines/ct_vw_insert';

define('RT_RESEARCH_SUBLINES_DB_INS','rt-research-sublines-db-ins');
$route[RT_RESEARCH_SUBLINES_DB_INS] = 'prepare/ResearchSubLines/ct_db_insert';

define('RT_RESEARCH_SUBLINES_VW_UPD','rt-research-sublines-vw-upd');
$route[RT_RESEARCH_SUBLINES_VW_UPD.'/(:any)'] = "prepare/ResearchSubLines/ct_vw_update/$1";

define('RT_RESEARCH_SUBLINES_DB_UPD','rt-research-sublines-db-upd');
$route[RT_RESEARCH_SUBLINES_DB_UPD.'/(:any)'] = "prepare/ResearchSubLines/ct_db_update/$1";

define('RT_RESEARCH_SUBLINES_DB_DEL','rt-research-sublines-db-del');
$route[RT_RESEARCH_SUBLINES_DB_DEL.'/(:any)'] = "prepare/ResearchSubLines/ct_db_delete/$1";

/* TYPES_TESTS */
define('RT_TYPES_TESTS','rt-types-tests');
$route[RT_TYPES_TESTS]           = 'prepare/TypesTests';
$route[RT_TYPES_TESTS.'/(:num)'] = 'prepare/TypesTests';

define('RT_TYPES_TESTS_VW_INS','rt-types-tests-vw-ins');
$route[RT_TYPES_TESTS_VW_INS] = 'prepare/TypesTests/ct_vw_insert';

define('RT_TYPES_TESTS_DB_INS','rt-types-tests-db-ins');
$route[RT_TYPES_TESTS_DB_INS] = 'prepare/TypesTests/ct_db_insert';

define('RT_TYPES_TESTS_VW_UPD','rt-types-tests-vw-upd');
$route[RT_TYPES_TESTS_VW_UPD.'/(:any)'] = "prepare/TypesTests/ct_vw_update/$1";

define('RT_TYPES_TESTS_DB_UPD','rt-types-tests-db-upd');
$route[RT_TYPES_TESTS_DB_UPD.'/(:any)'] = "prepare/TypesTests/ct_db_update/$1";

define('RT_TYPES_TESTS_DB_DEL','rt-types-tests-db-del');
$route[RT_TYPES_TESTS_DB_DEL.'/(:any)'] = "prepare/TypesTests/ct_db_delete/$1";

/* APPLICATION_MODES */
define('RT_APPLICATION_MODES','rt-application-modes');
$route[RT_APPLICATION_MODES]           = 'prepare/ApplicationModes';
$route[RT_APPLICATION_MODES.'/(:num)'] = 'prepare/ApplicationModes';

define('RT_APPLICATION_MODES_VW_INS','rt-application-modes-vw-ins');
$route[RT_APPLICATION_MODES_VW_INS] = 'prepare/ApplicationModes/ct_vw_insert';

define('RT_APPLICATION_MODES_DB_INS','rt-application-modes-db-ins');
$route[RT_APPLICATION_MODES_DB_INS] = 'prepare/ApplicationModes/ct_db_insert';

define('RT_APPLICATION_MODES_VW_UPD','rt-application-modes-vw-upd');
$route[RT_APPLICATION_MODES_VW_UPD.'/(:any)'] = "prepare/ApplicationModes/ct_vw_update/$1";

define('RT_APPLICATION_MODES_DB_UPD','rt-application-modes-db-upd');
$route[RT_APPLICATION_MODES_DB_UPD.'/(:any)'] = "prepare/ApplicationModes/ct_db_update/$1";

define('RT_APPLICATION_MODES_DB_DEL','rt-application-modes-db-del');
$route[RT_APPLICATION_MODES_DB_DEL.'/(:any)'] = "prepare/ApplicationModes/ct_db_delete/$1";

/* VARIETIES_LICENSORS */
define('RT_VARIETIES_LICENSORS','rt-varieties-licensers');
$route[RT_VARIETIES_LICENSORS]           = 'prepare/VarietiesLicensors';
$route[RT_VARIETIES_LICENSORS.'/(:num)'] = 'prepare/VarietiesLicensors';

define('RT_VARIETIES_LICENSORS_VW_INS','rt-varieties-licensers-vw-ins');
$route[RT_VARIETIES_LICENSORS_VW_INS] = 'prepare/VarietiesLicensors/ct_vw_insert';

define('RT_VARIETIES_LICENSORS_DB_INS','rt-varieties-licensers-db-ins');
$route[RT_VARIETIES_LICENSORS_DB_INS] = 'prepare/VarietiesLicensors/ct_db_insert';

define('RT_VARIETIES_LICENSORS_VW_UPD','rt-varieties-licensers-vw-upd');
$route[RT_VARIETIES_LICENSORS_VW_UPD.'/(:any)'] = "prepare/VarietiesLicensors/ct_vw_update/$1";

define('RT_VARIETIES_LICENSORS_DB_UPD','rt-varieties-licensers-db-upd');
$route[RT_VARIETIES_LICENSORS_DB_UPD.'/(:any)'] = "prepare/VarietiesLicensors/ct_db_update/$1";

define('RT_VARIETIES_LICENSORS_DB_DEL','rt-varieties-licensers-db-del');
$route[RT_VARIETIES_LICENSORS_DB_DEL.'/(:any)'] = "prepare/VarietiesLicensors/ct_db_delete/$1";

/* VARIETIES */
define('RT_VARIETIES','rt-varieties');
$route[RT_VARIETIES]           = 'prepare/Varieties';
$route[RT_VARIETIES.'/(:num)'] = 'prepare/Varieties';

define('RT_VARIETIES_VW_INS','rt-varieties-vw-ins');
$route[RT_VARIETIES_VW_INS] = 'prepare/Varieties/ct_vw_insert';

define('RT_VARIETIES_DB_INS','rt-varieties-db-ins');
$route[RT_VARIETIES_DB_INS] = 'prepare/Varieties/ct_db_insert';

define('RT_VARIETIES_VW_UPD','rt-varieties-vw-upd');
$route[RT_VARIETIES_VW_UPD.'/(:any)'] = "prepare/Varieties/ct_vw_update/$1";

define('RT_VARIETIES_DB_UPD','rt-varieties-db-upd');
$route[RT_VARIETIES_DB_UPD.'/(:any)'] = "prepare/Varieties/ct_db_update/$1";

define('RT_VARIETIES_DB_DEL','rt-varieties-db-del');
$route[RT_VARIETIES_DB_DEL.'/(:any)'] = "prepare/Varieties/ct_db_delete/$1";

/* MISCELLANEOUS */
define('RT_MISCELLANEOUS','rt-miscellaneous');
$route[RT_MISCELLANEOUS]           = 'prepare/Miscellaneous';
$route[RT_MISCELLANEOUS.'/(:num)'] = 'prepare/Miscellaneous';

define('RT_MISCELLANEOUS_VW_INS','rt-miscellaneous-vw-ins');
$route[RT_MISCELLANEOUS_VW_INS] = 'prepare/Miscellaneous/ct_vw_insert';

define('RT_MISCELLANEOUS_DB_INS','rt-miscellaneous-db-ins');
$route[RT_MISCELLANEOUS_DB_INS] = 'prepare/Miscellaneous/ct_db_insert';

define('RT_MISCELLANEOUS_VW_UPD','rt-miscellaneous-vw-upd');
$route[RT_MISCELLANEOUS_VW_UPD.'/(:any)'] = "prepare/Miscellaneous/ct_vw_update/$1";

define('RT_MISCELLANEOUS_DB_UPD','rt-miscellaneous-db-upd');
$route[RT_MISCELLANEOUS_DB_UPD.'/(:any)'] = "prepare/Miscellaneous/ct_db_update/$1";

define('RT_MISCELLANEOUS_DB_DEL','rt-miscellaneous-db-del');
$route[RT_MISCELLANEOUS_DB_DEL.'/(:any)'] = "prepare/Miscellaneous/ct_db_delete/$1";

/* MANUFACTURERS */
define('RT_MANUFACTURERS','rt-manufacturers');
$route[RT_MANUFACTURERS]           = 'prepare/Manufacturers';
$route[RT_MANUFACTURERS.'/(:num)'] = 'prepare/Manufacturers';

define('RT_MANUFACTURERS_VW_INS','rt-manufacturers-vw-ins');
$route[RT_MANUFACTURERS_VW_INS] = 'prepare/Manufacturers/ct_vw_insert';

define('RT_MANUFACTURERS_DB_INS','rt-manufacturers-db-ins');
$route[RT_MANUFACTURERS_DB_INS] = 'prepare/Manufacturers/ct_db_insert';

define('RT_MANUFACTURERS_VW_UPD','rt-manufacturers-vw-upd');
$route[RT_MANUFACTURERS_VW_UPD.'/(:any)'] = "prepare/Manufacturers/ct_vw_update/$1";

define('RT_MANUFACTURERS_DB_UPD','rt-manufacturers-db-upd');
$route[RT_MANUFACTURERS_DB_UPD.'/(:any)'] = "prepare/Manufacturers/ct_db_update/$1";

define('RT_MANUFACTURERS_DB_DEL','rt-manufacturers-db-del');
$route[RT_MANUFACTURERS_DB_DEL.'/(:any)'] = "prepare/Manufacturers/ct_db_delete/$1";

/* PRODUCTS_GROUPS */
define('RT_PRODUCTS_GROUPS','rt-products-groups');
$route[RT_PRODUCTS_GROUPS]           = 'prepare/ProductsGroups';
$route[RT_PRODUCTS_GROUPS.'/(:num)'] = 'prepare/ProductsGroups';

define('RT_PRODUCTS_GROUPS_VW_INS','rt-products-groups-vw-ins');
$route[RT_PRODUCTS_GROUPS_VW_INS] = 'prepare/ProductsGroups/ct_vw_insert';

define('RT_PRODUCTS_GROUPS_DB_INS','rt-products-groups-db-ins');
$route[RT_PRODUCTS_GROUPS_DB_INS] = 'prepare/ProductsGroups/ct_db_insert';

define('RT_PRODUCTS_GROUPS_VW_UPD','rt-products-groups-vw-upd');
$route[RT_PRODUCTS_GROUPS_VW_UPD.'/(:any)'] = "prepare/ProductsGroups/ct_vw_update/$1";

define('RT_PRODUCTS_GROUPS_DB_UPD','rt-products-groups-db-upd');
$route[RT_PRODUCTS_GROUPS_DB_UPD.'/(:any)'] = "prepare/ProductsGroups/ct_db_update/$1";

define('RT_PRODUCTS_GROUPS_DB_DEL','rt-products-groups-db-del');
$route[RT_PRODUCTS_GROUPS_DB_DEL.'/(:any)'] = "prepare/ProductsGroups/ct_db_delete/$1";

/* PRODUCTS */
define('RT_PRODUCTS','rt-products');
$route[RT_PRODUCTS]           = 'prepare/Products';
$route[RT_PRODUCTS.'/(:num)'] = 'prepare/Products';

define('RT_PRODUCTS_VW_INS','rt-products-vw-ins');
$route[RT_PRODUCTS_VW_INS] = 'prepare/Products/ct_vw_insert';

define('RT_PRODUCTS_DB_INS','rt-products-db-ins');
$route[RT_PRODUCTS_DB_INS] = 'prepare/Products/ct_db_insert';

define('RT_PRODUCTS_VW_UPD','rt-products-vw-upd');
$route[RT_PRODUCTS_VW_UPD.'/(:any)'] = "prepare/Products/ct_vw_update/$1";

define('RT_PRODUCTS_DB_UPD','rt-products-db-upd');
$route[RT_PRODUCTS_DB_UPD.'/(:any)'] = "prepare/Products/ct_db_update/$1";

define('RT_PRODUCTS_DB_DEL','rt-products-db-del');
$route[RT_PRODUCTS_DB_DEL.'/(:any)'] = "prepare/Products/ct_db_delete/$1";

/* COMPOUNDS */
define('RT_COMPOUNDS','rt-compounds');
$route[RT_COMPOUNDS]           = 'prepare/Compounds';
$route[RT_COMPOUNDS.'/(:num)'] = 'prepare/Compounds';

define('RT_COMPOUNDS_VW_INS','rt-compounds-vw-ins');
$route[RT_COMPOUNDS_VW_INS] = 'prepare/Compounds/ct_vw_insert';

define('RT_COMPOUNDS_DB_INS','rt-compounds-db-ins');
$route[RT_COMPOUNDS_DB_INS] = 'prepare/Compounds/ct_db_insert';

define('RT_COMPOUNDS_VW_UPD','rt-compounds-vw-upd');
$route[RT_COMPOUNDS_VW_UPD.'/(:any)'] = "prepare/Compounds/ct_vw_update/$1";

define('RT_COMPOUNDS_DB_UPD','rt-compounds-db-upd');
$route[RT_COMPOUNDS_DB_UPD.'/(:any)'] = "prepare/Compounds/ct_db_update/$1";

define('RT_COMPOUNDS_DB_DEL','rt-compounds-db-del');
$route[RT_COMPOUNDS_DB_DEL.'/(:any)'] = "prepare/Compounds/ct_db_delete/$1";

/* GU_REGIONS */
define('RT_GU_REGIONS','rt-gu-regions');
$route[RT_GU_REGIONS]           = 'prepare/GuRegions';
$route[RT_GU_REGIONS.'/(:num)'] = 'prepare/GuRegions';

define('RT_GU_REGIONS_VW_INS','rt-gu-regions-vw-ins');
$route[RT_GU_REGIONS_VW_INS] = 'prepare/GuRegions/ct_vw_insert';

define('RT_GU_REGIONS_DB_INS','rt-gu-regions-db-ins');
$route[RT_GU_REGIONS_DB_INS] = 'prepare/GuRegions/ct_db_insert';

define('RT_GU_REGIONS_VW_UPD','rt-gu-regions-vw-upd');
$route[RT_GU_REGIONS_VW_UPD.'/(:any)'] = "prepare/GuRegions/ct_vw_update/$1";

define('RT_GU_REGIONS_DB_UPD','rt-gu-regions-db-upd');
$route[RT_GU_REGIONS_DB_UPD.'/(:any)'] = "prepare/GuRegions/ct_db_update/$1";

define('RT_GU_REGIONS_DB_DEL','rt-gu-regions-db-del');
$route[RT_GU_REGIONS_DB_DEL.'/(:any)'] = "prepare/GuRegions/ct_db_delete/$1";

/* GU_FARMS */
define('RT_GU_FARMS','rt-gu-farms');
$route[RT_GU_FARMS]           = 'prepare/GuFarms';
$route[RT_GU_FARMS.'/(:num)'] = 'prepare/GuFarms';

define('RT_GU_FARMS_VW_INS','rt-gu-farms-vw-ins');
$route[RT_GU_FARMS_VW_INS] = 'prepare/GuFarms/ct_vw_insert';

define('RT_GU_FARMS_DB_INS','rt-gu-farms-db-ins');
$route[RT_GU_FARMS_DB_INS] = 'prepare/GuFarms/ct_db_insert';

define('RT_GU_FARMS_VW_UPD','rt-gu-farms-vw-upd');
$route[RT_GU_FARMS_VW_UPD.'/(:any)'] = 'prepare/GuFarms/ct_vw_update/$1';

define('RT_GU_FARMS_DB_UPD','rt-gu-farms-db-upd');
$route[RT_GU_FARMS_DB_UPD.'/(:any)'] = 'prepare/GuFarms/ct_db_update/$1';

define('RT_GU_FARMS_DB_DEL','rt-gu-farms-db-del');
$route[RT_GU_FARMS_DB_DEL.'/(:any)'] = 'prepare/GuFarms/ct_db_delete/$1';

define('RT_CALL_GU_FARMS_PLOTS','rt-call-gu-farms-plots');
$route[RT_CALL_GU_FARMS_PLOTS.'/(:any)'] = 'prepare/GuFarms/ct_call_farms_plots/$1';

/* GU_PLOTS */
define('RT_GU_PLOTS','rt-gu-plots');
$route[RT_GU_PLOTS]             = 'prepare/GuPlots';
$route[RT_GU_PLOTS.'/(:num)']   = 'prepare/GuPlots';

define('RT_GU_PLOTS_VW_INS','rt-gu-plots-vw-ins');
$route[RT_GU_PLOTS_VW_INS] = 'prepare/GuPlots/ct_vw_insert';

define('RT_GU_PLOTS_DB_INS','rt-gu-plots-db-ins');
$route[RT_GU_PLOTS_DB_INS] = 'prepare/GuPlots/ct_db_insert';

define('RT_GU_PLOTS_VW_UPD','rt-gu-plots-vw-upd');
$route[RT_GU_PLOTS_VW_UPD.'/(:any)'] = "prepare/GuPlots/ct_vw_update/$1";

define('RT_GU_PLOTS_DB_UPD','rt-gu-plots-db-upd');
$route[RT_GU_PLOTS_DB_UPD.'/(:any)'] = "prepare/GuPlots/ct_db_update/$1";

define('RT_GU_PLOTS_DB_DEL','rt-gu-plots-db-del');
$route[RT_GU_PLOTS_DB_DEL.'/(:any)'] = "prepare/GuPlots/ct_db_delete/$1";

define('RT_CALL_GU_PLOTS_GU_PARCELS','rt-call-gu-plots-gu-parcels');
$route[RT_CALL_GU_PLOTS_GU_PARCELS.'/(:any)'] = 'prepare/GuPlots/ct_call_gu_plots_gu_parcels/$1';

/* GU_PARCELS */
define('RT_GU_PARCELS','rt-gu-parcels');
$route[RT_GU_PARCELS]             = 'prepare/GuParcels';
$route[RT_GU_PARCELS.'/(:num)']   = 'prepare/GuParcels';

define('RT_GU_PARCELS_VW_INS','rt-gu-parcels-vw-ins');
$route[RT_GU_PARCELS_VW_INS] = 'prepare/GuParcels/ct_vw_insert';

define('RT_GU_PARCELS_DB_INS','rt-gu-parcels-db-ins');
$route[RT_GU_PARCELS_DB_INS] = 'prepare/GuParcels/ct_db_insert';

define('RT_GU_PARCELS_VW_UPD','rt-gu-parcels-vw-upd');
$route[RT_GU_PARCELS_VW_UPD.'/(:any)'] = "prepare/GuParcels/ct_vw_update/$1";

define('RT_GU_PARCELS_DB_UPD','rt-gu-parcels-db-upd');
$route[RT_GU_PARCELS_DB_UPD.'/(:any)'] = "prepare/GuParcels/ct_db_update/$1";

define('RT_GU_PARCELS_DB_DEL','rt-gu-parcels-db-del');
$route[RT_GU_PARCELS_DB_DEL.'/(:any)'] = "prepare/GuParcels/ct_db_delete/$1";

/* PLANTING_SCHEMES */
define('RT_PLANTING_SCHEMES','rt-planting-schemes');
$route[RT_PLANTING_SCHEMES]           = 'prepare/PlantingSchemes';
$route[RT_PLANTING_SCHEMES.'/(:num)'] = 'prepare/PlantingSchemes';

define('RT_PLANTING_SCHEMES_VW_INS','rt-planting-schemes-vw-ins');
$route[RT_PLANTING_SCHEMES_VW_INS] = 'prepare/PlantingSchemes/ct_vw_insert';

define('RT_PLANTING_SCHEMES_DB_INS','rt-planting-schemes-db-ins');
$route[RT_PLANTING_SCHEMES_DB_INS] = 'prepare/PlantingSchemes/ct_db_insert';

define('RT_PLANTING_SCHEMES_VW_UPD','rt-planting-schemes-vw-upd');
$route[RT_PLANTING_SCHEMES_VW_UPD.'/(:any)'] = "prepare/PlantingSchemes/ct_vw_update/$1";

define('RT_PLANTING_SCHEMES_DB_UPD','rt-planting-schemes-db-upd');
$route[RT_PLANTING_SCHEMES_DB_UPD.'/(:any)'] = "prepare/PlantingSchemes/ct_db_update/$1";

define('RT_PLANTING_SCHEMES_DB_DEL','rt-planting-schemes-db-del');
$route[RT_PLANTING_SCHEMES_DB_DEL.'/(:any)'] = "prepare/PlantingSchemes/ct_db_delete/$1";

/* DESIGNING (DELINEAMENTO) */
define('RT_DESIGNING','rt-designing');
$route[RT_DESIGNING]           = 'prepare/Designing';
$route[RT_DESIGNING.'/(:num)'] = 'prepare/Designing';

define('RT_DESIGNING_VW_INS','rt-designing-vw-ins');
$route[RT_DESIGNING_VW_INS] = 'prepare/Designing/ct_vw_insert';

define('RT_DESIGNING_DB_INS','rt-designing-db-ins');
$route[RT_DESIGNING_DB_INS] = 'prepare/Designing/ct_db_insert';

define('RT_DESIGNING_VW_UPD','rt-designing-vw-upd');
$route[RT_DESIGNING_VW_UPD.'/(:any)'] = "prepare/Designing/ct_vw_update/$1";

define('RT_DESIGNING_DB_UPD','rt-designing-db-upd');
$route[RT_DESIGNING_DB_UPD.'/(:any)'] = "prepare/Designing/ct_db_update/$1";

define('RT_DESIGNING_DB_DEL','rt-designing-db-del');
$route[RT_DESIGNING_DB_DEL.'/(:any)'] = "prepare/Designing/ct_db_delete/$1";

/* RT_FACTORS_DQL */
define('RT_FACTORS_DQL','rt-factorsdql');
$route[RT_FACTORS_DQL]           = 'prepare/FactorsDQL';
$route[RT_FACTORS_DQL.'/(:num)'] = 'prepare/FactorsDQL';

define('RT_FACTORS_DQL_VW_INS','rt-factorsdql-vw-ins');
$route[RT_FACTORS_DQL_VW_INS] = 'prepare/FactorsDQL/ct_vw_insert';

define('RT_FACTORS_DQL_DB_INS','rt-factorsdql-db-ins');
$route[RT_FACTORS_DQL_DB_INS] = 'prepare/FactorsDQL/ct_db_insert';

define('RT_FACTORS_DQL_VW_UPD','rt-factorsdql-vw-upd');
$route[RT_FACTORS_DQL_VW_UPD.'/(:any)'] = "prepare/FactorsDQL/ct_vw_update/$1";

define('RT_FACTORS_DQL_DB_UPD','rt-factorsdql-db-upd');
$route[RT_FACTORS_DQL_DB_UPD.'/(:any)'] = "prepare/FactorsDQL/ct_db_update/$1";

define('RT_FACTORS_DQL_DB_DEL','rt-factorsdql-db-del');
$route[RT_FACTORS_DQL_DB_DEL.'/(:any)'] = "prepare/FactorsDQL/ct_db_delete/$1";

/* RT_TREATMENTS_DQL */
define('RT_TREATMENTS_DQL','rt-treatmentsdql');
$route[RT_TREATMENTS_DQL]           = 'prepare/TreatmentsDQL';
$route[RT_TREATMENTS_DQL.'/(:num)'] = 'prepare/TreatmentsDQL';

define('RT_TREATMENTS_DQL_VW_INS','rt-treatmentsdql-vw-ins');
$route[RT_TREATMENTS_DQL_VW_INS] = 'prepare/TreatmentsDQL/ct_vw_insert';

define('RT_TREATMENTS_DQL_DB_INS','rt-treatmentsdql-db-ins');
$route[RT_TREATMENTS_DQL_DB_INS] = 'prepare/TreatmentsDQL/ct_db_insert';

define('RT_TREATMENTS_DQL_VW_UPD','rt-treatmentsdql-vw-upd');
$route[RT_TREATMENTS_DQL_VW_UPD.'/(:any)'] = "prepare/TreatmentsDQL/ct_vw_update/$1";

define('RT_TREATMENTS_DQL_DB_UPD','rt-treatmentsdql-db-upd');
$route[RT_TREATMENTS_DQL_DB_UPD.'/(:any)'] = "prepare/TreatmentsDQL/ct_db_update/$1";

define('RT_TREATMENTS_DQL_DB_DEL','rt-treatmentsdql-db-del');
$route[RT_TREATMENTS_DQL_DB_DEL.'/(:any)'] = "prepare/TreatmentsDQL/ct_db_delete/$1";

/* SPACING (ESPAÇAMENTO AGRÍCOLA) */
define('RT_SPACING','rt-spacing');
$route[RT_SPACING]           = 'prepare/Spacing';
$route[RT_SPACING.'/(:num)'] = 'prepare/Spacing';

define('RT_SPACING_VW_INS','rt-spacing-vw-ins');
$route[RT_SPACING_VW_INS] = 'prepare/Spacing/ct_vw_insert';

define('RT_SPACING_DB_INS','rt-spacing-db-ins');
$route[RT_SPACING_DB_INS] = 'prepare/Spacing/ct_db_insert';

define('RT_SPACING_VW_UPD','rt-spacing-vw-upd');
$route[RT_SPACING_VW_UPD.'/(:any)'] = "prepare/Spacing/ct_vw_update/$1";

define('RT_SPACING_DB_UPD','rt-spacing-db-upd');
$route[RT_SPACING_DB_UPD.'/(:any)'] = "prepare/Spacing/ct_db_update/$1";

define('RT_SPACING_DB_DEL','rt-spacing-db-del');
$route[RT_SPACING_DB_DEL.'/(:any)'] = "prepare/Spacing/ct_db_delete/$1";

/* MATURATION */
define('RT_MATURATION','rt-maturation');
$route[RT_MATURATION]           = 'prepare/Maturation';
$route[RT_MATURATION.'/(:num)'] = 'prepare/Maturation';

define('RT_MATURATION_VW_INS','rt-maturation-vw-ins');
$route[RT_MATURATION_VW_INS] = 'prepare/Maturation/ct_vw_insert';

define('RT_MATURATION_DB_INS','rt-maturation-db-ins');
$route[RT_MATURATION_DB_INS] = 'prepare/Maturation/ct_db_insert';

define('RT_MATURATION_VW_UPD','rt-maturation-vw-upd');
$route[RT_MATURATION_VW_UPD.'/(:any)'] = "prepare/Maturation/ct_vw_update/$1";

define('RT_MATURATION_DB_UPD','rt-maturation-db-upd');
$route[RT_MATURATION_DB_UPD.'/(:any)'] = "prepare/Maturation/ct_db_update/$1";

define('RT_MATURATION_DB_DEL','rt-maturation-db-del');
$route[RT_MATURATION_DB_DEL.'/(:any)'] = "prepare/Maturation/ct_db_delete/$1";

/* RT_TEAMS */
define('RT_TEAMS','rt-teams');
$route[RT_TEAMS]           = 'prepare/Teams';
$route[RT_TEAMS.'/(:num)'] = 'prepare/Teams';

define('RT_TEAMS_VW_INS','rt-teams-vw-ins');
$route[RT_TEAMS_VW_INS] = 'prepare/Teams/ct_vw_insert';

define('RT_TEAMS_DB_INS','rt-teams-db-ins');
$route[RT_TEAMS_DB_INS] = 'prepare/Teams/ct_db_insert';

define('RT_TEAMS_VW_UPD','rt-teams-vw-upd');
$route[RT_TEAMS_VW_UPD.'/(:any)'] = "prepare/Teams/ct_vw_update/$1";

define('RT_TEAMS_DB_UPD','rt-teams-db-upd');
$route[RT_TEAMS_DB_UPD.'/(:any)'] = "prepare/Teams/ct_db_update/$1";

define('RT_TEAMS_DB_DEL','rt-teams-db-del');
$route[RT_TEAMS_DB_DEL.'/(:any)'] = "prepare/Teams/ct_db_delete/$1";

/* MEASURE_UNITS */
define('RT_MEASURE_UNITS','rt-measure-units');
$route[RT_MEASURE_UNITS]           = 'prepare/MeasureUnits';
$route[RT_MEASURE_UNITS.'/(:num)'] = 'prepare/MeasureUnits';

define('RT_MEASURE_UNITS_VW_INS','rt-measure-units-vw-ins');
$route[RT_MEASURE_UNITS_VW_INS] = 'prepare/MeasureUnits/ct_vw_insert';

define('RT_MEASURE_UNITS_DB_INS','rt-measure-units-db-ins');
$route[RT_MEASURE_UNITS_DB_INS] = 'prepare/MeasureUnits/ct_db_insert';

define('RT_MEASURE_UNITS_VW_UPD','rt-measure-units-vw-upd');
$route[RT_MEASURE_UNITS_VW_UPD.'/(:any)'] = "prepare/MeasureUnits/ct_vw_update/$1";

define('RT_MEASURE_UNITS_DB_UPD','rt-measure-units-db-upd');
$route[RT_MEASURE_UNITS_DB_UPD.'/(:any)'] = "prepare/MeasureUnits/ct_db_update/$1";

define('RT_MEASURE_UNITS_DB_DEL','rt-measure-units-db-del');
$route[RT_MEASURE_UNITS_DB_DEL.'/(:any)'] = "prepare/MeasureUnits/ct_db_delete/$1";

/* DOSES */
define('RT_DOSES','rt-doses');
$route[RT_DOSES]           = 'prepare/Doses';
$route[RT_DOSES.'/(:num)'] = 'prepare/Doses';

define('RT_DOSES_VW_INS','rt-doses-vw-ins');
$route[RT_DOSES_VW_INS] = 'prepare/Doses/ct_vw_insert';

define('RT_DOSES_DB_INS','rt-doses-db-ins');
$route[RT_DOSES_DB_INS] = 'prepare/Doses/ct_db_insert';

define('RT_DOSES_VW_UPD','rt-doses-vw-upd');
$route[RT_DOSES_VW_UPD.'/(:any)'] = "prepare/Doses/ct_vw_update/$1";

define('RT_DOSES_DB_UPD','rt-doses-db-upd');
$route[RT_DOSES_DB_UPD.'/(:any)'] = "prepare/Doses/ct_db_update/$1";

define('RT_DOSES_DB_DEL','rt-doses-db-del');
$route[RT_DOSES_DB_DEL.'/(:any)'] = "prepare/Doses/ct_db_delete/$1";

/* RT_CHECKS_DESCRIPTIONS */
define('RT_CHECKS_DESCRIPTIONS','rt-checks-descriptions');
$route[RT_CHECKS_DESCRIPTIONS]           = 'prepare/ChecksDescriptions';
$route[RT_CHECKS_DESCRIPTIONS.'/(:num)'] = 'prepare/ChecksDescriptions';

define('RT_CHECKS_DESCRIPTIONS_VW_INS','rt-checks-descriptions-vw-ins');
$route[RT_CHECKS_DESCRIPTIONS_VW_INS] = 'prepare/ChecksDescriptions/ct_vw_insert';

define('RT_CHECKS_DESCRIPTIONS_DB_INS','rt-checks-descriptions-db-ins');
$route[RT_CHECKS_DESCRIPTIONS_DB_INS] = 'prepare/ChecksDescriptions/ct_db_insert';

define('RT_CHECKS_DESCRIPTIONS_VW_UPD','rt-checks-descriptions-vw-upd');
$route[RT_CHECKS_DESCRIPTIONS_VW_UPD.'/(:any)'] = "prepare/ChecksDescriptions/ct_vw_update/$1";

define('RT_CHECKS_DESCRIPTIONS_DB_UPD','rt-checks-descriptions-db-upd');
$route[RT_CHECKS_DESCRIPTIONS_DB_UPD.'/(:any)'] = "prepare/ChecksDescriptions/ct_db_update/$1";

define('RT_CHECKS_DESCRIPTIONS_DB_DEL','rt-checks-descriptions-db-del');
$route[RT_CHECKS_DESCRIPTIONS_DB_DEL.'/(:any)'] = "prepare/ChecksDescriptions/ct_db_delete/$1";

/* RT_CHECKS_METHODS */
define('RT_CHECKS_METHODS','rt-checks-methods');
$route[RT_CHECKS_METHODS]           = 'prepare/ChecksMethods';
$route[RT_CHECKS_METHODS.'/(:num)'] = 'prepare/ChecksMethods';

define('RT_CHECKS_METHODS_VW_INS','rt-checks-methods-vw-ins');
$route[RT_CHECKS_METHODS_VW_INS] = 'prepare/ChecksMethods/ct_vw_insert';

define('RT_CHECKS_METHODS_DB_INS','rt-checks-methods-db-ins');
$route[RT_CHECKS_METHODS_DB_INS] = 'prepare/ChecksMethods/ct_db_insert';

define('RT_CHECKS_METHODS_VW_UPD','rt-checks-methods-vw-upd');
$route[RT_CHECKS_METHODS_VW_UPD.'/(:any)'] = "prepare/ChecksMethods/ct_vw_update/$1";

define('RT_CHECKS_METHODS_DB_UPD','rt-checks-methods-db-upd');
$route[RT_CHECKS_METHODS_DB_UPD.'/(:any)'] = "prepare/ChecksMethods/ct_db_update/$1";

define('RT_CHECKS_METHODS_DB_DEL','rt-checks-methods-db-del');
$route[RT_CHECKS_METHODS_DB_DEL.'/(:any)'] = "prepare/ChecksMethods/ct_db_delete/$1";

/* RT_STATION_WEATHERS */
define('RT_STATION_WEATHERS','rt-station-weathers');
$route[RT_STATION_WEATHERS]           = 'prepare/StationWeathers';
$route[RT_STATION_WEATHERS.'/(:num)'] = 'prepare/StationWeathers';

define('RT_STATION_WEATHERS_VW_INS','rt-station-weathers-vw-ins');
$route[RT_STATION_WEATHERS_VW_INS] = 'prepare/StationWeathers/ct_vw_insert';

define('RT_STATION_WEATHERS_DB_INS','rt-station-weathers-db-ins');
$route[RT_STATION_WEATHERS_DB_INS] = 'prepare/StationWeathers/ct_db_insert';

define('RT_STATION_WEATHERS_VW_UPD','rt-station-weathers-vw-upd');
$route[RT_STATION_WEATHERS_VW_UPD.'/(:any)'] = "prepare/StationWeathers/ct_vw_update/$1";

define('RT_STATION_WEATHERS_DB_UPD','rt-station-weathers-db-upd');
$route[RT_STATION_WEATHERS_DB_UPD.'/(:any)'] = "prepare/StationWeathers/ct_db_update/$1";

define('RT_STATION_WEATHERS_DB_DEL','rt-station-weathers-db-del');
$route[RT_STATION_WEATHERS_DB_DEL.'/(:any)'] = "prepare/StationWeathers/ct_db_delete/$1";

/* RT_WEATHER */
define('RT_WEATHERS','rt-weathers');
$route[RT_WEATHERS]           = 'prepare/Weathers';
$route[RT_WEATHERS.'/(:num)'] = 'prepare/Weathers';

define('RT_WEATHERS_VW_INS','rt-weathers-vw-ins');
$route[RT_WEATHERS_VW_INS] = 'prepare/Weathers/ct_vw_insert';

define('RT_WEATHERS_DB_INS','rt-weathers-db-ins');
$route[RT_WEATHERS_DB_INS] = 'prepare/Weathers/ct_db_insert';

define('RT_WEATHERS_VW_UPD','rt-weathers-vw-upd');
$route[RT_WEATHERS_VW_UPD.'/(:any)'] = "prepare/Weathers/ct_vw_update/$1";

define('RT_WEATHERS_DB_UPD','rt-weathers-db-upd');
$route[RT_WEATHERS_DB_UPD.'/(:any)'] = "prepare/Weathers/ct_db_update/$1";

define('RT_WEATHERS_DB_DEL','rt-weathers-db-del');
$route[RT_WEATHERS_DB_DEL.'/(:any)'] = "prepare/Weathers/ct_db_delete/$1";

/* DISEASES_GROUPS */
define('RT_DISEASES_GROUPS','rt-diseases-groups');
$route[RT_DISEASES_GROUPS]           = 'prepare/DiseasesGroups';
$route[RT_DISEASES_GROUPS.'/(:num)'] = 'prepare/DiseasesGroups';

define('RT_DISEASES_GROUPS_VW_INS','rt-diseases-groups-vw-ins');
$route[RT_DISEASES_GROUPS_VW_INS] = 'prepare/DiseasesGroups/ct_vw_insert';

define('RT_DISEASES_GROUPS_DB_INS','rt-diseases-groups-db-ins');
$route[RT_DISEASES_GROUPS_DB_INS] = 'prepare/DiseasesGroups/ct_db_insert';

define('RT_DISEASES_GROUPS_VW_UPD','rt-diseases-groups-vw-upd');
$route[RT_DISEASES_GROUPS_VW_UPD.'/(:any)'] = "prepare/DiseasesGroups/ct_vw_update/$1";

define('RT_DISEASES_GROUPS_DB_UPD','rt-diseases-groups-db-upd');
$route[RT_DISEASES_GROUPS_DB_UPD.'/(:any)'] = "prepare/DiseasesGroups/ct_db_update/$1";

define('RT_DISEASES_GROUPS_DB_DEL','rt-diseases-groups-db-del');
$route[RT_DISEASES_GROUPS_DB_DEL.'/(:any)'] = "prepare/DiseasesGroups/ct_db_delete/$1";

/* DISEASES */
define('RT_DISEASES','rt-diseases');
$route[RT_DISEASES]           = 'prepare/Diseases';
$route[RT_DISEASES.'/(:num)'] = 'prepare/Diseases';

define('RT_DISEASES_VW_INS','rt-diseases-vw-ins');
$route[RT_DISEASES_VW_INS] = 'prepare/Diseases/ct_vw_insert';

define('RT_DISEASES_DB_INS','rt-diseases-db-ins');
$route[RT_DISEASES_DB_INS] = 'prepare/Diseases/ct_db_insert';

define('RT_DISEASES_VW_UPD','rt-diseases-vw-upd');
$route[RT_DISEASES_VW_UPD.'/(:any)'] = "prepare/Diseases/ct_vw_update/$1";

define('RT_DISEASES_DB_UPD','rt-diseases-db-upd');
$route[RT_DISEASES_DB_UPD.'/(:any)'] = "prepare/Diseases/ct_db_update/$1";

define('RT_DISEASES_DB_DEL','rt-diseases-db-del');
$route[RT_DISEASES_DB_DEL.'/(:any)'] = "prepare/Diseases/ct_db_delete/$1";

/* PESTS_GROUPS */
define('RT_PESTS_GROUPS','rt-pests-groups');
$route[RT_PESTS_GROUPS]           = 'prepare/PestsGroups';
$route[RT_PESTS_GROUPS.'/(:num)'] = 'prepare/PestsGroups';

define('RT_PESTS_GROUPS_VW_INS','rt-pests-groups-vw-ins');
$route[RT_PESTS_GROUPS_VW_INS] = 'prepare/PestsGroups/ct_vw_insert';

define('RT_PESTS_GROUPS_DB_INS','rt-pests-groups-db-ins');
$route[RT_PESTS_GROUPS_DB_INS] = 'prepare/PestsGroups/ct_db_insert';

define('RT_PESTS_GROUPS_VW_UPD','rt-pests-groups-vw-upd');
$route[RT_PESTS_GROUPS_VW_UPD.'/(:any)'] = "prepare/PestsGroups/ct_vw_update/$1";

define('RT_PESTS_GROUPS_DB_UPD','rt-pests-groups-db-upd');
$route[RT_PESTS_GROUPS_DB_UPD.'/(:any)'] = "prepare/PestsGroups/ct_db_update/$1";

define('RT_PESTS_GROUPS_DB_DEL','rt-pests-groups-db-del');
$route[RT_PESTS_GROUPS_DB_DEL.'/(:any)'] = "prepare/PestsGroups/ct_db_delete/$1";

/* PESTS */
define('RT_PESTS','rt-pests');
$route[RT_PESTS]           = 'prepare/Pests';
$route[RT_PESTS.'/(:num)'] = 'prepare/Pests';

define('RT_PESTS_VW_INS','rt-pests-vw-ins');
$route[RT_PESTS_VW_INS] = 'prepare/Pests/ct_vw_insert';

define('RT_PESTS_DB_INS','rt-pests-db-ins');
$route[RT_PESTS_DB_INS] = 'prepare/Pests/ct_db_insert';

define('RT_PESTS_VW_UPD','rt-pests-vw-upd');
$route[RT_PESTS_VW_UPD.'/(:any)'] = "prepare/Pests/ct_vw_update/$1";

define('RT_PESTS_DB_UPD','rt-pests-db-upd');
$route[RT_PESTS_DB_UPD.'/(:any)'] = "prepare/Pests/ct_db_update/$1";

define('RT_PESTS_DB_DEL','rt-pests-db-del');
$route[RT_PESTS_DB_DEL.'/(:any)'] = "prepare/Pests/ct_db_delete/$1";

/*
| -------------------------------------------------------------------------
| PROTOCOLS pages
| -------------------------------------------------------------------------
*/

/* PROTOCOLS */
define('RT_PROTOCOLS','rt-protocols');
$route[RT_PROTOCOLS]           = 'protocols/Protocols';
$route[RT_PROTOCOLS.'/(:num)'] = 'protocols/Protocols';

define('RT_PROTOCOLS_VW_INS','rt-protocols-vw-ins');
$route[RT_PROTOCOLS_VW_INS] = 'protocols/Protocols/ct_vw_insert';

define('RT_PROTOCOLS_DB_INS','rt-protocols-db-ins');
$route[RT_PROTOCOLS_DB_INS] = 'protocols/Protocols/ct_db_insert';

define('RT_PROTOCOLS_VW_UPD','rt-protocols-vw-upd');
$route[RT_PROTOCOLS_VW_UPD.'/(:any)'] = "protocols/Protocols/ct_vw_update/$1";

define('RT_PROTOCOLS_DB_UPD','rt-protocols-db-upd');
$route[RT_PROTOCOLS_DB_UPD.'/(:any)'] = "protocols/Protocols/ct_db_update/$1";

define('RT_PROTOCOLS_DB_DEL','rt-protocols-db-del');
$route[RT_PROTOCOLS_DB_DEL.'/(:any)'] = "protocols/Protocols/ct_db_delete/$1";

define('RT_PROTOCOLS_DB_UPD_STATUS','rt-protocols-db-upd-status');
$route[RT_PROTOCOLS_DB_UPD_STATUS.'/(:any)/(:num)'] = "protocols/Protocols/ct_db_upd_status/$1/$2";

define('RT_CALL_PROTOCOLS_GU_PLOTS','rt-call-protocols-gu-plots');
$route[RT_CALL_PROTOCOLS_GU_PLOTS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_gu_plots/$1';

define('RT_CALL_PROTOCOLS_IDEALIZERS','rt-call-protocols-idealizers');
$route[RT_CALL_PROTOCOLS_IDEALIZERS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_idealizers/$1';

define('RT_CALL_PROTOCOLS_STATION_WEATHERS','rt-call-protocols-station-weathers');
$route[RT_CALL_PROTOCOLS_STATION_WEATHERS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_station_weathers/$1';

define('RT_CALL_PROTOCOLS_SAMPLES','rt-call-protocols-samples');
$route[RT_CALL_PROTOCOLS_SAMPLES.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_samples/$1';

define('RT_CALL_PROTOCOLS_VARIABLES','rt-call-protocols-variables');
$route[RT_CALL_PROTOCOLS_VARIABLES.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_variables/$1';

define('RT_CALL_PROTOCOLS_TEAMS','rt-call-protocols-teams');
$route[RT_CALL_PROTOCOLS_TEAMS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_teams/$1';

define('RT_CALL_PROTOCOLS_CHECKS','rt-call-protocols-checks');
$route[RT_CALL_PROTOCOLS_CHECKS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_checks/$1';

define('RT_CALL_PROTOCOLS_VARIETIES','rt-call-protocols-varieties');
$route[RT_CALL_PROTOCOLS_VARIETIES.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_varieties/$1';

define('RT_CALL_PROTOCOLS_PRODUCTS','rt-call-protocols-products');
$route[RT_CALL_PROTOCOLS_PRODUCTS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_products/$1';

define('RT_CALL_PROTOCOLS_FACTORS_DQL','rt-call-protocols-factors-dql');
$route[RT_CALL_PROTOCOLS_FACTORS_DQL.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_factorsdql/$1';

define('RT_CALL_PROTOCOLS_COMPOSED','rt-call-protocols-composed');
$route[RT_CALL_PROTOCOLS_COMPOSED.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_composed/$1';

define('RT_CALL_PROTOCOLS_MISCELLANEOUS','rt-call-protocols-miscellaneous');
$route[RT_CALL_PROTOCOLS_MISCELLANEOUS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_miscellaneous/$1';

define('RT_CALL_PROTOCOLS_RESULT','rt-call-protocols-result');
$route[RT_CALL_PROTOCOLS_RESULT.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_result/$1';

define('RT_CALL_PROTOCOLS_SKETCHES','rt-call-protocols-sketches');
$route[RT_CALL_PROTOCOLS_SKETCHES.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_sketches/$1';

define('RT_CALL_PROTOCOLS_NOTES','rt-call-protocols-notes');
$route[RT_CALL_PROTOCOLS_NOTES.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_notes/$1';

define('RT_CALL_PROTOCOLS_ATTACHS','rt-call-protocols-attachs');
$route[RT_CALL_PROTOCOLS_ATTACHS.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_attachs/$1';

define('RT_CALL_PROTOCOLS_CLOSE','rt-call-protocols-close');
$route[RT_CALL_PROTOCOLS_CLOSE.'/(:any)'] = 'protocols/Protocols/ct_call_protocols_close/$1';

define('RT_CALL_PROTOCOLS_FILTER_STATUS','rt-call-protocols-filter-status');
$route[RT_CALL_PROTOCOLS_FILTER_STATUS.'/(:num)'] = 'protocols/Protocols/ct_call_protocols_filter_status/$1';

define('RT_CALL_PROTOCOLS_VIEW_OPTION','rt-call-protocols-view-option');
$route[RT_CALL_PROTOCOLS_VIEW_OPTION.'/(:num)'] = 'protocols/Protocols/ct_call_protocols_view_option/$1';

define('RT_CALL_SAMPLES_ANALYZE','rt-call-samples-analyze');
$route[RT_CALL_SAMPLES_ANALYZE.'/(:any)'] = 'protocols/Protocols/ct_call_samples_analyze/$1';

define('RT_CALL_SAMPLES_WEIGHT','rt-call-samples-weight');
$route[RT_CALL_SAMPLES_WEIGHT.'/(:any)'] = 'protocols/Protocols/ct_call_samples_weight/$1';

define('RT_CALL_SAMPLES_STEMS','rt-call-samples-stems');
$route[RT_CALL_SAMPLES_STEMS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_stems/$1';

define('RT_CALL_SAMPLES_DIAMETERS','rt-call-samples-diameters');
$route[RT_CALL_SAMPLES_DIAMETERS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_diameters/$1';

define('RT_CALL_SAMPLES_HEIGHTS','rt-call-samples-heights');
$route[RT_CALL_SAMPLES_HEIGHTS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_heights/$1';

define('RT_CALL_SAMPLES_INTERNODES','rt-call-samples-internodes');
$route[RT_CALL_SAMPLES_INTERNODES.'/(:any)'] = 'protocols/Protocols/ct_call_samples_internodes/$1';

define('RT_CALL_SAMPLES_FLOWERING','rt-call-samples-flowering');
$route[RT_CALL_SAMPLES_FLOWERING.'/(:any)'] = 'protocols/Protocols/ct_call_samples_flowering/$1';

define('RT_CALL_SAMPLES_PITH','rt-call-samples-pith');
$route[RT_CALL_SAMPLES_PITH.'/(:any)'] = 'protocols/Protocols/ct_call_samples_pith/$1';

define('RT_CALL_SAMPLES_TILLERS','rt-call-samples-tillers');
$route[RT_CALL_SAMPLES_TILLERS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_tillers/$1';

define('RT_CALL_SAMPLES_GAPS','rt-call-samples-gaps');
$route[RT_CALL_SAMPLES_GAPS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_gaps/$1';

define('RT_CALL_SAMPLES_INFESTATION','rt-call-samples-infestation');
$route[RT_CALL_SAMPLES_INFESTATION.'/(:any)'] = 'protocols/Protocols/ct_call_samples_infestation/$1';

define('RT_CALL_SAMPLES_HOLES','rt-call-samples-holes');
$route[RT_CALL_SAMPLES_HOLES.'/(:any)'] = 'protocols/Protocols/ct_call_samples_holes/$1';

define('RT_CALL_SAMPLES_DAMAGES','rt-call-samples-damages');
$route[RT_CALL_SAMPLES_DAMAGES.'/(:any)'] = 'protocols/Protocols/ct_call_samples_damages/$1';

define('RT_CALL_SAMPLES_COMPOUNDS','rt-call-samples-compounds');
$route[RT_CALL_SAMPLES_COMPOUNDS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_compounds/$1';

define('RT_CALL_SAMPLES_DISEASES','rt-call-samples-diseases');
$route[RT_CALL_SAMPLES_DISEASES.'/(:any)'] = 'protocols/Protocols/ct_call_samples_diseases/$1';

define('RT_CALL_SAMPLES_PESTS','rt-call-samples-pests');
$route[RT_CALL_SAMPLES_PESTS.'/(:any)'] = 'protocols/Protocols/ct_call_samples_pests/$1';

/* RT_PROTOCOLS_GU_PLOTS */
define('RT_PROTOCOLS_GU_PLOTS','rt-protocols-gu-plots');
$route[RT_PROTOCOLS_GU_PLOTS]           = 'protocols/ProtocolsGuPlots';
$route[RT_PROTOCOLS_GU_PLOTS.'/(:num)'] = 'protocols/ProtocolsGuPlots';

define('RT_PROTOCOLS_GU_PLOTS_VW_INS','rt-protocols-gu-plots-vw-ins');
$route[RT_PROTOCOLS_GU_PLOTS_VW_INS] = 'protocols/ProtocolsGuPlots/ct_vw_insert';

define('RT_PROTOCOLS_GU_PLOTS_DB_INS','rt-protocols-gu-plots-db-ins');
$route[RT_PROTOCOLS_GU_PLOTS_DB_INS] = 'protocols/ProtocolsGuPlots/ct_db_insert';

define('RT_PROTOCOLS_GU_PLOTS_VW_UPD','rt-protocols-gu-plots-vw-upd');
$route[RT_PROTOCOLS_GU_PLOTS_VW_UPD.'/(:any)'] = "protocols/ProtocolsGuPlots/ct_vw_update/$1";

define('RT_PROTOCOLS_GU_PLOTS_DB_UPD','rt-protocols-gu-plots-db-upd');
$route[RT_PROTOCOLS_GU_PLOTS_DB_UPD.'/(:any)'] = "protocols/ProtocolsGuPlots/ct_db_update/$1";

define('RT_PROTOCOLS_GU_PLOTS_DB_DEL','rt-protocols-gu-plots-db-del');
$route[RT_PROTOCOLS_GU_PLOTS_DB_DEL.'/(:any)'] = "protocols/ProtocolsGuPlots/ct_db_delete/$1";

/* RT_PROTOCOLS_IDEALIZERS */
define('RT_PROTOCOLS_IDEALIZERS','rt-protocols-idealizers');
$route[RT_PROTOCOLS_IDEALIZERS]           = 'protocols/ProtocolsIdealizers';
$route[RT_PROTOCOLS_IDEALIZERS.'/(:num)'] = 'protocols/ProtocolsIdealizers';

define('RT_PROTOCOLS_IDEALIZERS_VW_INS','rt-protocols-idealizers-vw-ins');
$route[RT_PROTOCOLS_IDEALIZERS_VW_INS] = 'protocols/ProtocolsIdealizers/ct_vw_insert';

define('RT_PROTOCOLS_IDEALIZERS_DB_INS','rt-protocols-idealizers-db-ins');
$route[RT_PROTOCOLS_IDEALIZERS_DB_INS] = 'protocols/ProtocolsIdealizers/ct_db_insert';

define('RT_PROTOCOLS_IDEALIZERS_VW_UPD','rt-protocols-idealizers-vw-upd');
$route[RT_PROTOCOLS_IDEALIZERS_VW_UPD.'/(:any)'] = "protocols/ProtocolsIdealizers/ct_vw_update/$1";

define('RT_PROTOCOLS_IDEALIZERS_DB_UPD','rt-protocols-idealizers-db-upd');
$route[RT_PROTOCOLS_IDEALIZERS_DB_UPD.'/(:any)'] = "protocols/ProtocolsIdealizers/ct_db_update/$1";

define('RT_PROTOCOLS_IDEALIZERS_DB_DEL','rt-protocols-idealizers-db-del');
$route[RT_PROTOCOLS_IDEALIZERS_DB_DEL.'/(:any)'] = "protocols/ProtocolsIdealizers/ct_db_delete/$1";

/* RT_PROTOCOLS_STATION_WEATHERS */
define('RT_PROTOCOLS_STATION_WEATHERS','rt-protocols-station-weathers');
$route[RT_PROTOCOLS_STATION_WEATHERS]           = 'protocols/ProtocolsStationWeathers';
$route[RT_PROTOCOLS_STATION_WEATHERS.'/(:num)'] = 'protocols/ProtocolsStationWeathers';

define('RT_PROTOCOLS_STATION_WEATHERS_VW_INS','rt-protocols-station-weathers-vw-ins');
$route[RT_PROTOCOLS_STATION_WEATHERS_VW_INS] = 'protocols/ProtocolsStationWeathers/ct_vw_insert';

define('RT_PROTOCOLS_STATION_WEATHERS_DB_INS','rt-protocols-station-weathers-db-ins');
$route[RT_PROTOCOLS_STATION_WEATHERS_DB_INS] = 'protocols/ProtocolsStationWeathers/ct_db_insert';

define('RT_PROTOCOLS_STATION_WEATHERS_VW_UPD','rt-protocols-station-weathers-vw-upd');
$route[RT_PROTOCOLS_STATION_WEATHERS_VW_UPD.'/(:any)'] = "protocols/ProtocolsStationWeathers/ct_vw_update/$1";

define('RT_PROTOCOLS_STATION_WEATHERS_DB_UPD','rt-protocols-station-weathers-db-upd');
$route[RT_PROTOCOLS_STATION_WEATHERS_DB_UPD.'/(:any)'] = "protocols/ProtocolsStationWeathers/ct_db_update/$1";

define('RT_PROTOCOLS_STATION_WEATHERS_DB_DEL','rt-protocols-station-weathers-db-del');
$route[RT_PROTOCOLS_STATION_WEATHERS_DB_DEL.'/(:any)'] = "protocols/ProtocolsStationWeathers/ct_db_delete/$1";

/* RT_PROTOCOLS_TEAMS */
define('RT_PROTOCOLS_TEAMS','rt-protocols-teams');
$route[RT_PROTOCOLS_TEAMS]           = 'protocols/ProtocolsTeams';
$route[RT_PROTOCOLS_TEAMS.'/(:num)'] = 'protocols/ProtocolsTeams';

define('RT_PROTOCOLS_TEAMS_VW_INS','rt-protocols-teams-vw-ins');
$route[RT_PROTOCOLS_TEAMS_VW_INS] = 'protocols/ProtocolsTeams/ct_vw_insert';

define('RT_PROTOCOLS_TEAMS_DB_INS','rt-protocols-teams-db-ins');
$route[RT_PROTOCOLS_TEAMS_DB_INS] = 'protocols/ProtocolsTeams/ct_db_insert';

define('RT_PROTOCOLS_TEAMS_VW_UPD','rt-protocols-teams-vw-upd');
$route[RT_PROTOCOLS_TEAMS_VW_UPD.'/(:any)'] = "protocols/ProtocolsTeams/ct_vw_update/$1";

define('RT_PROTOCOLS_TEAMS_DB_UPD','rt-protocols-teams-db-upd');
$route[RT_PROTOCOLS_TEAMS_DB_UPD.'/(:any)'] = "protocols/ProtocolsTeams/ct_db_update/$1";

define('RT_PROTOCOLS_TEAMS_DB_DEL','rt-protocols-teams-db-del');
$route[RT_PROTOCOLS_TEAMS_DB_DEL.'/(:any)'] = "protocols/ProtocolsTeams/ct_db_delete/$1";

/* RT_PROTOCOLS_SAMPLES */
define('RT_PROTOCOLS_SAMPLES','rt-protocols-samples');
$route[RT_PROTOCOLS_SAMPLES]           = 'protocols/ProtocolsSamples';
$route[RT_PROTOCOLS_SAMPLES.'/(:num)'] = 'protocols/ProtocolsSamples';

define('RT_PROTOCOLS_SAMPLES_VW_INS','rt-protocols-samples-vw-ins');
$route[RT_PROTOCOLS_SAMPLES_VW_INS] = 'protocols/ProtocolsSamples/ct_vw_insert';

define('RT_PROTOCOLS_SAMPLES_DB_INS','rt-protocols-samples-db-ins');
$route[RT_PROTOCOLS_SAMPLES_DB_INS] = 'protocols/ProtocolsSamples/ct_db_insert';

define('RT_PROTOCOLS_SAMPLES_DB_DEL','rt-protocols-samples-db-del');
$route[RT_PROTOCOLS_SAMPLES_DB_DEL.'/(:any)'] = "protocols/ProtocolsSamples/ct_db_delete/$1";

/* RT_PROTOCOLS_VARIABLES */
define('RT_PROTOCOLS_VARIABLES','rt-protocols-variables');
$route[RT_PROTOCOLS_VARIABLES]           = 'protocols/ProtocolsVariables';
$route[RT_PROTOCOLS_VARIABLES.'/(:num)'] = 'protocols/ProtocolsVariables';

define('RT_PROTOCOLS_VARIABLES_VW_INS','rt-protocols-variables-vw-ins');
$route[RT_PROTOCOLS_VARIABLES_VW_INS] = 'protocols/ProtocolsVariables/ct_vw_insert';

define('RT_PROTOCOLS_VARIABLES_DB_INS','rt-protocols-variables-db-ins');
$route[RT_PROTOCOLS_VARIABLES_DB_INS] = 'protocols/ProtocolsVariables/ct_db_insert';

define('RT_PROTOCOLS_VARIABLES_DB_DEL','rt-protocols-variables-db-del');
$route[RT_PROTOCOLS_VARIABLES_DB_DEL.'/(:any)'] = "protocols/ProtocolsVariables/ct_db_delete/$1";

/* RT_PROTOCOLS_CHECKS */
define('RT_PROTOCOLS_CHECKS','rt-protocols-checks');
$route[RT_PROTOCOLS_CHECKS]           = 'protocols/ProtocolsChecks';
$route[RT_PROTOCOLS_CHECKS.'/(:num)'] = 'protocols/ProtocolsChecks';

define('RT_PROTOCOLS_CHECKS_VW_INS','rt-protocols-checks-vw-ins');
$route[RT_PROTOCOLS_CHECKS_VW_INS] = 'protocols/ProtocolsChecks/ct_vw_insert';

define('RT_PROTOCOLS_CHECKS_DB_INS','rt-protocols-checks-db-ins');
$route[RT_PROTOCOLS_CHECKS_DB_INS] = 'protocols/ProtocolsChecks/ct_db_insert';

define('RT_PROTOCOLS_CHECKS_VW_UPD','rt-protocols-checks-vw-upd');
$route[RT_PROTOCOLS_CHECKS_VW_UPD.'/(:any)'] = "protocols/ProtocolsChecks/ct_vw_update/$1";

define('RT_PROTOCOLS_CHECKS_DB_UPD','rt-protocols-checks-db-upd');
$route[RT_PROTOCOLS_CHECKS_DB_UPD.'/(:any)'] = "protocols/ProtocolsChecks/ct_db_update/$1";

define('RT_PROTOCOLS_CHECKS_DB_DEL','rt-protocols-checks-db-del');
$route[RT_PROTOCOLS_CHECKS_DB_DEL.'/(:any)'] = "protocols/ProtocolsChecks/ct_db_delete/$1";

define('RT_PROTOCOLS_CHECKS_SEND_MAIL','rt-protocols-checks-send-mail');
$route[RT_PROTOCOLS_CHECKS_SEND_MAIL.'/(:any)'] = "protocols/ProtocolsChecks/ct_send_mail/$1";

/* RT_PROTOCOLS_VARIETIES */
define('RT_PROTOCOLS_VARIETIES','rt-protocols-varieties');
$route[RT_PROTOCOLS_VARIETIES]           = 'protocols/ProtocolsVarieties';
$route[RT_PROTOCOLS_VARIETIES.'/(:num)'] = 'protocols/ProtocolsVarieties';

define('RT_PROTOCOLS_VARIETIES_VW_INS','rt-protocols-varieties-vw-ins');
$route[RT_PROTOCOLS_VARIETIES_VW_INS] = 'protocols/ProtocolsVarieties/ct_vw_insert';

define('RT_PROTOCOLS_VARIETIES_DB_INS','rt-protocols-varieties-db-ins');
$route[RT_PROTOCOLS_VARIETIES_DB_INS] = 'protocols/ProtocolsVarieties/ct_db_insert';

define('RT_PROTOCOLS_VARIETIES_VW_UPD','rt-protocols-varieties-vw-upd');
$route[RT_PROTOCOLS_VARIETIES_VW_UPD.'/(:any)'] = "protocols/ProtocolsVarieties/ct_vw_update/$1";

define('RT_PROTOCOLS_VARIETIES_DB_UPD','rt-protocols-varieties-db-upd');
$route[RT_PROTOCOLS_VARIETIES_DB_UPD.'/(:any)'] = "protocols/ProtocolsVarieties/ct_db_update/$1";

define('RT_PROTOCOLS_VARIETIES_DB_DEL','rt-protocols-varieties-db-del');
$route[RT_PROTOCOLS_VARIETIES_DB_DEL.'/(:any)'] = "protocols/ProtocolsVarieties/ct_db_delete/$1";

/* RT_PROTOCOLS_MISCELLANEOUS */
define('RT_PROTOCOLS_MISCELLANEOUS','rt-protocols-miscellaneous');
$route[RT_PROTOCOLS_MISCELLANEOUS]           = 'protocols/ProtocolsMiscellaneous';
$route[RT_PROTOCOLS_MISCELLANEOUS.'/(:num)'] = 'protocols/ProtocolsMiscellaneous';

define('RT_PROTOCOLS_MISCELLANEOUS_VW_INS','rt-protocols-miscellaneous-vw-ins');
$route[RT_PROTOCOLS_MISCELLANEOUS_VW_INS] = 'protocols/ProtocolsMiscellaneous/ct_vw_insert';

define('RT_PROTOCOLS_MISCELLANEOUS_DB_INS','rt-protocols-miscellaneous-db-ins');
$route[RT_PROTOCOLS_MISCELLANEOUS_DB_INS] = 'protocols/ProtocolsMiscellaneous/ct_db_insert';

define('RT_PROTOCOLS_MISCELLANEOUS_VW_UPD','rt-protocols-miscellaneous-vw-upd');
$route[RT_PROTOCOLS_MISCELLANEOUS_VW_UPD.'/(:any)'] = "protocols/ProtocolsMiscellaneous/ct_vw_update/$1";

define('RT_PROTOCOLS_MISCELLANEOUS_DB_UPD','rt-protocols-miscellaneous-db-upd');
$route[RT_PROTOCOLS_MISCELLANEOUS_DB_UPD.'/(:any)'] = "protocols/ProtocolsMiscellaneous/ct_db_update/$1";

define('RT_PROTOCOLS_MISCELLANEOUS_DB_DEL','rt-protocols-miscellaneous-db-del');
$route[RT_PROTOCOLS_MISCELLANEOUS_DB_DEL.'/(:any)'] = "protocols/ProtocolsMiscellaneous/ct_db_delete/$1";

/* RT_PROTOCOLS_PRODUCTS */
define('RT_PROTOCOLS_PRODUCTS','rt-protocols-products');
$route[RT_PROTOCOLS_PRODUCTS]           = 'protocols/ProtocolsProducts';
$route[RT_PROTOCOLS_PRODUCTS.'/(:num)'] = 'protocols/ProtocolsProducts';

define('RT_PROTOCOLS_PRODUCTS_VW_INS','rt-protocols-products-vw-ins');
$route[RT_PROTOCOLS_PRODUCTS_VW_INS] = 'protocols/ProtocolsProducts/ct_vw_insert';

define('RT_PROTOCOLS_PRODUCTS_DB_INS','rt-protocols-products-db-ins');
$route[RT_PROTOCOLS_PRODUCTS_DB_INS] = 'protocols/ProtocolsProducts/ct_db_insert';

define('RT_PROTOCOLS_PRODUCTS_VW_UPD','rt-protocols-products-vw-upd');
$route[RT_PROTOCOLS_PRODUCTS_VW_UPD.'/(:any)'] = "protocols/ProtocolsProducts/ct_vw_update/$1";

define('RT_PROTOCOLS_PRODUCTS_DB_UPD','rt-protocols-products-db-upd');
$route[RT_PROTOCOLS_PRODUCTS_DB_UPD.'/(:any)'] = "protocols/ProtocolsProducts/ct_db_update/$1";

define('RT_PROTOCOLS_PRODUCTS_DB_DEL','rt-protocols-products-db-del');
$route[RT_PROTOCOLS_PRODUCTS_DB_DEL.'/(:any)'] = "protocols/ProtocolsProducts/ct_db_delete/$1";

define('RT_CALL_PROTOCOLS_PRODUCTS_SETTINGS','rt-call-protocols-products-settings');
$route[RT_CALL_PROTOCOLS_PRODUCTS_SETTINGS.'/(:any)/(:any)'] = 'protocols/ProtocolsProducts/ct_call_protocols_products_settings/$1/$2';

define('RT_CALL_PROTOCOLS_PRODUCTS_COMPOUNDS','rt-call-protocols-products-compounds');
$route[RT_CALL_PROTOCOLS_PRODUCTS_COMPOUNDS.'/(:any)/(:any)'] = 'protocols/ProtocolsProducts/ct_call_protocols_products_compounds/$1/$2';

/* RT_PROTOCOLS_PRODUCTS_SETTINGS */
define('RT_PROTOCOLS_PRODUCTS_SETTINGS','rt-protocols-products-settings');
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS]           = 'protocols/ProtocolsProductsSettings';
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS.'/(:num)'] = 'protocols/ProtocolsProductsSettings';

define('RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS','rt-protocols-products-settings-vw-ins');
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS.'/(:num)/(:num)'] = 'protocols/ProtocolsProductsSettings/ct_vw_insert/$1/$2';

define('RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_INS','rt-protocols-products-settings-db-ins');
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_INS] = 'protocols/ProtocolsProductsSettings/ct_db_insert';

define('RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_UPD','rt-protocols-products-settings-vw-upd');
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_UPD.'/(:any)'] = 'protocols/ProtocolsProductsSettings/ct_vw_update/$1';

define('RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_UPD','rt-protocols-products-settings-db-upd');
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_UPD.'/(:any)'] = 'protocols/ProtocolsProductsSettings/ct_db_update/$1';

define('RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_DEL','rt-protocols-products-settings-db-del');
$route[RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_DEL.'/(:any)'] = 'protocols/ProtocolsProductsSettings/ct_db_delete/$1';

/* RT_PROTOCOLS_PRODUCTS_COMPOUNDS */
define('RT_PROTOCOLS_PRODUCTS_COMPOUNDS','rt-protocols-products-compounds');
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS]           = 'protocols/ProtocolsProductsCompounds';
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS.'/(:num)'] = 'protocols/ProtocolsProductsCompounds';

define('RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS','rt-protocols-products-compounds-vw-ins');
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS.'/(:num)/(:num)'] = 'protocols/ProtocolsProductsCompounds/ct_vw_insert/$1/$2';

define('RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_INS','rt-protocols-products-compounds-db-ins');
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_INS] = 'protocols/ProtocolsProductsCompounds/ct_db_insert';

define('RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_UPD','rt-protocols-products-compounds-vw-upd');
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_UPD.'/(:any)'] = 'protocols/ProtocolsProductsCompounds/ct_vw_update/$1';

define('RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_UPD','rt-protocols-products-compounds-db-upd');
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_UPD.'/(:any)'] = 'protocols/ProtocolsProductsCompounds/ct_db_update/$1';

define('RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_DEL','rt-protocols-products-compounds-db-del');
$route[RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_DEL.'/(:any)'] = 'protocols/ProtocolsProductsCompounds/ct_db_delete/$1';

/* RT_PROTOCOLS_FACTORS_DQL */
define('RT_PROTOCOLS_FACTORS_DQL','rt-protocols-factors-dql');
$route[RT_PROTOCOLS_FACTORS_DQL]           = 'protocols/ProtocolsFactorsDQL';
$route[RT_PROTOCOLS_FACTORS_DQL.'/(:num)'] = 'protocols/ProtocolsFactorsDQL';

define('RT_PROTOCOLS_FACTORS_DQL_VW_INS','rt-protocols-factors-dql-vw-ins');
$route[RT_PROTOCOLS_FACTORS_DQL_VW_INS] = 'protocols/ProtocolsFactorsDQL/ct_vw_insert';

define('RT_PROTOCOLS_FACTORS_DQL_DB_INS','rt-protocols-factors-dql-db-ins');
$route[RT_PROTOCOLS_FACTORS_DQL_DB_INS] = 'protocols/ProtocolsFactorsDQL/ct_db_insert';

define('RT_PROTOCOLS_FACTORS_DQL_VW_UPD','rt-protocols-factors-dql-vw-upd');
$route[RT_PROTOCOLS_FACTORS_DQL_VW_UPD.'/(:any)'] = "protocols/ProtocolsFactorsDQL/ct_vw_update/$1";

define('RT_PROTOCOLS_FACTORS_DQL_DB_UPD','rt-protocols-factors-dql-db-upd');
$route[RT_PROTOCOLS_FACTORS_DQL_DB_UPD.'/(:any)'] = "protocols/ProtocolsFactorsDQL/ct_db_update/$1";

define('RT_PROTOCOLS_FACTORS_DQL_DB_DEL','rt-protocols-factors-dql-db-del');
$route[RT_PROTOCOLS_FACTORS_DQL_DB_DEL.'/(:any)'] = "protocols/ProtocolsFactorsDQL/ct_db_delete/$1";

/* RT_PROTOCOLS_TREATMENTS_DQL */
define('RT_PROTOCOLS_TREATMENTS_DQL','rt-protocols-treatments-dql');
$route[RT_PROTOCOLS_TREATMENTS_DQL]           = 'protocols/ProtocolsTreatmentsDQL';
$route[RT_PROTOCOLS_TREATMENTS_DQL.'/(:num)'] = 'protocols/ProtocolsTreatmentsDQL';

define('RT_PROTOCOLS_TREATMENTS_DQL_VW_INS','rt-protocols-treatments-dql-vw-ins');
$route[RT_PROTOCOLS_TREATMENTS_DQL_VW_INS] = 'protocols/ProtocolsTreatmentsDQL/ct_vw_insert';

define('RT_PROTOCOLS_TREATMENTS_DQL_DB_INS','rt-protocols-treatments-dql-db-ins');
$route[RT_PROTOCOLS_TREATMENTS_DQL_DB_INS] = 'protocols/ProtocolsTreatmentsDQL/ct_db_insert';

define('RT_PROTOCOLS_TREATMENTS_DQL_VW_UPD','rt-protocols-treatments-dql-vw-upd');
$route[RT_PROTOCOLS_TREATMENTS_DQL_VW_UPD.'/(:any)'] = "protocols/ProtocolsTreatmentsDQL/ct_vw_update/$1";

define('RT_PROTOCOLS_TREATMENTS_DQL_DB_UPD','rt-protocols-treatments-dql-db-upd');
$route[RT_PROTOCOLS_TREATMENTS_DQL_DB_UPD.'/(:any)'] = "protocols/ProtocolsTreatmentsDQL/ct_db_update/$1";

define('RT_PROTOCOLS_TREATMENTS_DQL_DB_DEL','rt-protocols-treatments-dql-db-del');
$route[RT_PROTOCOLS_TREATMENTS_DQL_DB_DEL.'/(:any)'] = "protocols/ProtocolsTreatmentsDQL/ct_db_delete/$1";

/* RT_PROTOCOLS_COMPOSED */
define('RT_PROTOCOLS_COMPOSED','rt-protocols-composed');
$route[RT_PROTOCOLS_COMPOSED]           = 'protocols/ProtocolsComposed';
$route[RT_PROTOCOLS_COMPOSED.'/(:num)'] = 'protocols/ProtocolsComposed';

define('RT_PROTOCOLS_COMPOSED_VW_INS','rt-protocols-composed-vw-ins');
$route[RT_PROTOCOLS_COMPOSED_VW_INS] = 'protocols/ProtocolsComposed/ct_vw_insert';

define('RT_PROTOCOLS_COMPOSED_DB_INS','rt-protocols-composed-db-ins');
$route[RT_PROTOCOLS_COMPOSED_DB_INS] = 'protocols/ProtocolsComposed/ct_db_insert';

define('RT_PROTOCOLS_COMPOSED_VW_UPD','rt-protocols-composed-vw-upd');
$route[RT_PROTOCOLS_COMPOSED_VW_UPD.'/(:any)'] = "protocols/ProtocolsComposed/ct_vw_update/$1";

define('RT_PROTOCOLS_COMPOSED_DB_UPD','rt-protocols-composed-db-upd');
$route[RT_PROTOCOLS_COMPOSED_DB_UPD.'/(:any)'] = "protocols/ProtocolsComposed/ct_db_update/$1";

define('RT_PROTOCOLS_COMPOSED_DB_DEL','rt-protocols-composed-db-del');
$route[RT_PROTOCOLS_COMPOSED_DB_DEL.'/(:any)'] = "protocols/ProtocolsComposed/ct_db_delete/$1";

/* RT_PROTOCOLS_SKETCHES */
define('RT_PROTOCOLS_SKETCHES','rt-protocols-sketches');
$route[RT_PROTOCOLS_SKETCHES]           = 'protocols/ProtocolsSketches';
$route[RT_PROTOCOLS_SKETCHES.'/(:num)'] = 'protocols/ProtocolsSketches';

define('RT_PROTOCOLS_SKETCHES_DB_INS','rt-protocols-sketches-db-ins');
$route[RT_PROTOCOLS_SKETCHES_DB_INS.'/(:any)'] = 'protocols/ProtocolsSketches/ct_db_insert/$1';

define('RT_PROTOCOLS_SKETCHES_DB_DEL','rt-protocols-sketches-db-del');
$route[RT_PROTOCOLS_SKETCHES_DB_DEL.'/(:any)'] = "protocols/ProtocolsSketches/ct_db_delete/$1";

define('RT_PROTOCOLS_SKETCHES_DB_UPD_ORDER','rt-protocols-sketches-db-upd-order');
$route[RT_PROTOCOLS_SKETCHES_DB_UPD_ORDER.'/(:num)/(:num)/(:num)/(:num)'] = 'protocols/ProtocolsSketches/ct_db_call_upd_order/$1/$2/$3/$4';

/* RT_PROTOCOLS_NOTES */
define('RT_PROTOCOLS_NOTES','rt-protocols-notes');
$route[RT_PROTOCOLS_NOTES]           = 'protocols/ProtocolsNotes';
$route[RT_PROTOCOLS_NOTES.'/(:num)'] = 'protocols/ProtocolsNotes';

define('RT_PROTOCOLS_NOTES_VW_INS','rt-protocols-notes-vw-ins');
$route[RT_PROTOCOLS_NOTES_VW_INS] = 'protocols/ProtocolsNotes/ct_vw_insert';

define('RT_PROTOCOLS_NOTES_DB_INS','rt-protocols-notes-db-ins');
$route[RT_PROTOCOLS_NOTES_DB_INS] = 'protocols/ProtocolsNotes/ct_db_insert';

define('RT_PROTOCOLS_NOTES_VW_UPD','rt-protocols-notes-vw-upd');
$route[RT_PROTOCOLS_NOTES_VW_UPD.'/(:any)'] = 'protocols/ProtocolsNotes/ct_vw_update/$1';

define('RT_PROTOCOLS_NOTES_DB_UPD','rt-protocols-notes-db-upd');
$route[RT_PROTOCOLS_NOTES_DB_UPD.'/(:any)'] = 'protocols/ProtocolsNotes/ct_db_update/$1';

define('RT_PROTOCOLS_NOTES_DB_DEL','rt-protocols-notes-db-del');
$route[RT_PROTOCOLS_NOTES_DB_DEL.'/(:any)'] = 'protocols/ProtocolsNotes/ct_db_delete/$1';

/* RT_PROTOCOLS_ATTACHS */
define('RT_PROTOCOLS_ATTACHS','rt-protocols-attachs');
$route[RT_PROTOCOLS_ATTACHS]           = 'protocols/ProtocolsAttachs';
$route[RT_PROTOCOLS_ATTACHS.'/(:num)'] = 'protocols/ProtocolsAttachs';

define('RT_PROTOCOLS_ATTACHS_UPLOAD','rt-protocols-attachs-upload');
$route[RT_PROTOCOLS_ATTACHS_UPLOAD] = 'protocols/ProtocolsAttachs/ct_upload';

define('RT_PROTOCOLS_ATTACHS_DOWNLOAD','rt-protocols-attachs-download');
$route[RT_PROTOCOLS_ATTACHS_DOWNLOAD.'/(:any)'] = 'protocols/ProtocolsAttachs/ct_download/$1';

define('RT_PROTOCOLS_ATTACHS_DB_DEL','rt-protocols-attachs-db-del');
$route[RT_PROTOCOLS_ATTACHS_DB_DEL.'/(:any)'] = 'protocols/ProtocolsAttachs/ct_db_delete/$1';

/* RT_PROTOCOLS_CLOSE */
define('RT_PROTOCOLS_CLOSE_VW_UPD','rt-protocols-close-vw-upd');
$route[RT_PROTOCOLS_CLOSE_VW_UPD.'/(:any)'] = 'protocols/ProtocolsClose/ct_vw_update/$1';

define('RT_PROTOCOLS_CLOSE_DB_UPD','rt-protocols-close-db-upd');
$route[RT_PROTOCOLS_CLOSE_DB_UPD.'/(:any)'] = 'protocols/ProtocolsClose/ct_db_update/$1';

/* RT_SAMPLES_ANALYZE */
define('RT_SAMPLES_ANALYZE','rt-samples-analyze');
$route[RT_SAMPLES_ANALYZE]           = 'protocols/SamplesAnalyze';
$route[RT_SAMPLES_ANALYZE.'/(:num)'] = 'protocols/SamplesAnalyze';

define('RT_SAMPLES_ANALYZE_VW_INS','rt-samples-analyze-vw-ins');
$route[RT_SAMPLES_ANALYZE_VW_INS.'/(:any)'] = 'protocols/SamplesAnalyze/ct_vw_insert/$1';

define('RT_SAMPLES_ANALYZE_DB_INS','rt-samples-analyze-db-ins');
$route[RT_SAMPLES_ANALYZE_DB_INS] = 'protocols/SamplesAnalyze/ct_db_insert';

define('RT_SAMPLES_ANALYZE_VW_UPD','rt-samples-analyze-vw-upd');
$route[RT_SAMPLES_ANALYZE_VW_UPD.'/(:any)'] = 'protocols/SamplesAnalyze/ct_vw_update/$1';

define('RT_SAMPLES_ANALYZE_DB_UPD','rt-samples-analyze-db-upd');
$route[RT_SAMPLES_ANALYZE_DB_UPD.'/(:any)'] = 'protocols/SamplesAnalyze/ct_db_update/$1';

define('RT_SAMPLES_ANALYZE_DB_DEL','rt-samples-analyze-db-del');
$route[RT_SAMPLES_ANALYZE_DB_DEL.'/(:any)'] = 'protocols/SamplesAnalyze/ct_db_delete/$1';

/* RT_SAMPLES_WEIGHT */
define('RT_SAMPLES_WEIGHT','rt-samples-weight');
$route[RT_SAMPLES_WEIGHT]           = 'protocols/SamplesWeight';
$route[RT_SAMPLES_WEIGHT.'/(:num)'] = 'protocols/SamplesWeight';

define('RT_SAMPLES_WEIGHT_VW_INS','rt-samples-weight-vw-ins');
$route[RT_SAMPLES_WEIGHT_VW_INS.'/(:any)'] = 'protocols/SamplesWeight/ct_vw_insert/$1';

define('RT_SAMPLES_WEIGHT_DB_INS','rt-samples-weight-db-ins');
$route[RT_SAMPLES_WEIGHT_DB_INS] = 'protocols/SamplesWeight/ct_db_insert';

define('RT_SAMPLES_WEIGHT_VW_UPD','rt-samples-weight-vw-upd');
$route[RT_SAMPLES_WEIGHT_VW_UPD.'/(:any)'] = 'protocols/SamplesWeight/ct_vw_update/$1';

define('RT_SAMPLES_WEIGHT_DB_UPD','rt-samples-weight-db-upd');
$route[RT_SAMPLES_WEIGHT_DB_UPD.'/(:any)'] = 'protocols/SamplesWeight/ct_db_update/$1';

define('RT_SAMPLES_WEIGHT_DB_DEL','rt-samples-weight-db-del');
$route[RT_SAMPLES_WEIGHT_DB_DEL.'/(:any)'] = 'protocols/SamplesWeight/ct_db_delete/$1';

/* RT_SAMPLES_STEMS */
define('RT_SAMPLES_STEMS','rt-samples-stems');
$route[RT_SAMPLES_STEMS]           = 'protocols/SamplesStems';
$route[RT_SAMPLES_STEMS.'/(:num)'] = 'protocols/SamplesStems';

define('RT_SAMPLES_STEMS_VW_INS','rt-samples-stems-vw-ins');
$route[RT_SAMPLES_STEMS_VW_INS.'/(:any)'] = 'protocols/SamplesStems/ct_vw_insert/$1';

define('RT_SAMPLES_STEMS_DB_INS','rt-samples-stems-db-ins');
$route[RT_SAMPLES_STEMS_DB_INS] = 'protocols/SamplesStems/ct_db_insert';

define('RT_SAMPLES_STEMS_VW_UPD','rt-samples-stems-vw-upd');
$route[RT_SAMPLES_STEMS_VW_UPD.'/(:any)'] = 'protocols/SamplesStems/ct_vw_update/$1';

define('RT_SAMPLES_STEMS_DB_UPD','rt-samples-stems-db-upd');
$route[RT_SAMPLES_STEMS_DB_UPD.'/(:any)'] = 'protocols/SamplesStems/ct_db_update/$1';

define('RT_SAMPLES_STEMS_DB_DEL','rt-samples-stems-db-del');
$route[RT_SAMPLES_STEMS_DB_DEL.'/(:any)'] = 'protocols/SamplesStems/ct_db_delete/$1';

/* RT_SAMPLES_DIAMETERS */
define('RT_SAMPLES_DIAMETERS','rt-samples-diameters');
$route[RT_SAMPLES_DIAMETERS]           = 'protocols/SamplesDiameters';
$route[RT_SAMPLES_DIAMETERS.'/(:num)'] = 'protocols/SamplesDiameters';

define('RT_SAMPLES_DIAMETERS_VW_INS','rt-samples-diameters-vw-ins');
$route[RT_SAMPLES_DIAMETERS_VW_INS.'/(:any)'] = 'protocols/SamplesDiameters/ct_vw_insert/$1';

define('RT_SAMPLES_DIAMETERS_DB_INS','rt-samples-diameters-db-ins');
$route[RT_SAMPLES_DIAMETERS_DB_INS] = 'protocols/SamplesDiameters/ct_db_insert';

define('RT_SAMPLES_DIAMETERS_VW_UPD','rt-samples-diameters-vw-upd');
$route[RT_SAMPLES_DIAMETERS_VW_UPD.'/(:any)'] = 'protocols/SamplesDiameters/ct_vw_update/$1';

define('RT_SAMPLES_DIAMETERS_DB_UPD','rt-samples-diameters-db-upd');
$route[RT_SAMPLES_DIAMETERS_DB_UPD.'/(:any)'] = 'protocols/SamplesDiameters/ct_db_update/$1';

define('RT_SAMPLES_DIAMETERS_DB_DEL','rt-samples-diameters-db-del');
$route[RT_SAMPLES_DIAMETERS_DB_DEL.'/(:any)'] = 'protocols/SamplesDiameters/ct_db_delete/$1';

/* RT_SAMPLES_HEIGHTS */
define('RT_SAMPLES_HEIGHTS','rt-samples-heights');
$route[RT_SAMPLES_HEIGHTS]           = 'protocols/SamplesHeights';
$route[RT_SAMPLES_HEIGHTS.'/(:num)'] = 'protocols/SamplesHeights';

define('RT_SAMPLES_HEIGHTS_VW_INS','rt-samples-heights-vw-ins');
$route[RT_SAMPLES_HEIGHTS_VW_INS.'/(:any)'] = 'protocols/SamplesHeights/ct_vw_insert/$1';

define('RT_SAMPLES_HEIGHTS_DB_INS','rt-samples-heights-db-ins');
$route[RT_SAMPLES_HEIGHTS_DB_INS] = 'protocols/SamplesHeights/ct_db_insert';

define('RT_SAMPLES_HEIGHTS_VW_UPD','rt-samples-heights-vw-upd');
$route[RT_SAMPLES_HEIGHTS_VW_UPD.'/(:any)'] = 'protocols/SamplesHeights/ct_vw_update/$1';

define('RT_SAMPLES_HEIGHTS_DB_UPD','rt-samples-heights-db-upd');
$route[RT_SAMPLES_HEIGHTS_DB_UPD.'/(:any)'] = 'protocols/SamplesHeights/ct_db_update/$1';

define('RT_SAMPLES_HEIGHTS_DB_DEL','rt-samples-heights-db-del');
$route[RT_SAMPLES_HEIGHTS_DB_DEL.'/(:any)'] = 'protocols/SamplesHeights/ct_db_delete/$1';

/* RT_SAMPLES_INTERNODES */
define('RT_SAMPLES_INTERNODES','rt-samples-internodes');
$route[RT_SAMPLES_INTERNODES]           = 'protocols/SamplesInternodes';
$route[RT_SAMPLES_INTERNODES.'/(:num)'] = 'protocols/SamplesInternodes';

define('RT_SAMPLES_INTERNODES_VW_INS','rt-samples-internodes-vw-ins');
$route[RT_SAMPLES_INTERNODES_VW_INS.'/(:any)'] = 'protocols/SamplesInternodes/ct_vw_insert/$1';

define('RT_SAMPLES_INTERNODES_DB_INS','rt-samples-internodes-db-ins');
$route[RT_SAMPLES_INTERNODES_DB_INS] = 'protocols/SamplesInternodes/ct_db_insert';

define('RT_SAMPLES_INTERNODES_VW_UPD','rt-samples-internodes-vw-upd');
$route[RT_SAMPLES_INTERNODES_VW_UPD.'/(:any)'] = 'protocols/SamplesInternodes/ct_vw_update/$1';

define('RT_SAMPLES_INTERNODES_DB_UPD','rt-samples-internodes-db-upd');
$route[RT_SAMPLES_INTERNODES_DB_UPD.'/(:any)'] = 'protocols/SamplesInternodes/ct_db_update/$1';

define('RT_SAMPLES_INTERNODES_DB_DEL','rt-samples-internodes-db-del');
$route[RT_SAMPLES_INTERNODES_DB_DEL.'/(:any)'] = 'protocols/SamplesInternodes/ct_db_delete/$1';

/* RT_SAMPLES_FLOWERING */
define('RT_SAMPLES_FLOWERING','rt-samples-flowering');
$route[RT_SAMPLES_FLOWERING]           = 'protocols/SamplesFlowering';
$route[RT_SAMPLES_FLOWERING.'/(:num)'] = 'protocols/SamplesFlowering';

define('RT_SAMPLES_FLOWERING_VW_INS','rt-samples-flowering-vw-ins');
$route[RT_SAMPLES_FLOWERING_VW_INS.'/(:any)'] = 'protocols/SamplesFlowering/ct_vw_insert/$1';

define('RT_SAMPLES_FLOWERING_DB_INS','rt-samples-flowering-db-ins');
$route[RT_SAMPLES_FLOWERING_DB_INS] = 'protocols/SamplesFlowering/ct_db_insert';

define('RT_SAMPLES_FLOWERING_VW_UPD','rt-samples-flowering-vw-upd');
$route[RT_SAMPLES_FLOWERING_VW_UPD.'/(:any)'] = 'protocols/SamplesFlowering/ct_vw_update/$1';

define('RT_SAMPLES_FLOWERING_DB_UPD','rt-samples-flowering-db-upd');
$route[RT_SAMPLES_FLOWERING_DB_UPD.'/(:any)'] = 'protocols/SamplesFlowering/ct_db_update/$1';

define('RT_SAMPLES_FLOWERING_DB_DEL','rt-samples-flowering-db-del');
$route[RT_SAMPLES_FLOWERING_DB_DEL.'/(:any)'] = 'protocols/SamplesFlowering/ct_db_delete/$1';

/* RT_SAMPLES_PITH */
define('RT_SAMPLES_PITH','rt-samples-pith');
$route[RT_SAMPLES_PITH]           = 'protocols/SamplesPith';
$route[RT_SAMPLES_PITH.'/(:num)'] = 'protocols/SamplesPith';

define('RT_SAMPLES_PITH_VW_INS','rt-samples-pith-vw-ins');
$route[RT_SAMPLES_PITH_VW_INS.'/(:any)'] = 'protocols/SamplesPith/ct_vw_insert/$1';

define('RT_SAMPLES_PITH_DB_INS','rt-samples-pith-db-ins');
$route[RT_SAMPLES_PITH_DB_INS] = 'protocols/SamplesPith/ct_db_insert';

define('RT_SAMPLES_PITH_VW_UPD','rt-samples-pith-vw-upd');
$route[RT_SAMPLES_PITH_VW_UPD.'/(:any)'] = 'protocols/SamplesPith/ct_vw_update/$1';

define('RT_SAMPLES_PITH_DB_UPD','rt-samples-pith-db-upd');
$route[RT_SAMPLES_PITH_DB_UPD.'/(:any)'] = 'protocols/SamplesPith/ct_db_update/$1';

define('RT_SAMPLES_PITH_DB_DEL','rt-samples-pith-db-del');
$route[RT_SAMPLES_PITH_DB_DEL.'/(:any)'] = 'protocols/SamplesPith/ct_db_delete/$1';

/* RT_SAMPLES_TILLERS */
define('RT_SAMPLES_TILLERS','rt-samples-tillers');
$route[RT_SAMPLES_TILLERS]           = 'protocols/SamplesTillers';
$route[RT_SAMPLES_TILLERS.'/(:num)'] = 'protocols/SamplesTillers';

define('RT_SAMPLES_TILLERS_VW_INS','rt-samples-tillers-vw-ins');
$route[RT_SAMPLES_TILLERS_VW_INS.'/(:any)'] = 'protocols/SamplesTillers/ct_vw_insert/$1';

define('RT_SAMPLES_TILLERS_DB_INS','rt-samples-tillers-db-ins');
$route[RT_SAMPLES_TILLERS_DB_INS] = 'protocols/SamplesTillers/ct_db_insert';

define('RT_SAMPLES_TILLERS_VW_UPD','rt-samples-tillers-vw-upd');
$route[RT_SAMPLES_TILLERS_VW_UPD.'/(:any)'] = 'protocols/SamplesTillers/ct_vw_update/$1';

define('RT_SAMPLES_TILLERS_DB_UPD','rt-samples-tillers-db-upd');
$route[RT_SAMPLES_TILLERS_DB_UPD.'/(:any)'] = 'protocols/SamplesTillers/ct_db_update/$1';

define('RT_SAMPLES_TILLERS_DB_DEL','rt-samples-tillers-db-del');
$route[RT_SAMPLES_TILLERS_DB_DEL.'/(:any)'] = 'protocols/SamplesTillers/ct_db_delete/$1';

/* RT_SAMPLES_GAPS */
define('RT_SAMPLES_GAPS','rt-samples-gaps');
$route[RT_SAMPLES_GAPS]           = 'protocols/SamplesGaps';
$route[RT_SAMPLES_GAPS.'/(:num)'] = 'protocols/SamplesGaps';

define('RT_SAMPLES_GAPS_VW_INS','rt-samples-gaps-vw-ins');
$route[RT_SAMPLES_GAPS_VW_INS.'/(:any)'] = 'protocols/SamplesGaps/ct_vw_insert/$1';

define('RT_SAMPLES_GAPS_DB_INS','rt-samples-gaps-db-ins');
$route[RT_SAMPLES_GAPS_DB_INS] = 'protocols/SamplesGaps/ct_db_insert';

define('RT_SAMPLES_GAPS_VW_UPD','rt-samples-gaps-vw-upd');
$route[RT_SAMPLES_GAPS_VW_UPD.'/(:any)'] = 'protocols/SamplesGaps/ct_vw_update/$1';

define('RT_SAMPLES_GAPS_DB_UPD','rt-samples-gaps-db-upd');
$route[RT_SAMPLES_GAPS_DB_UPD.'/(:any)'] = 'protocols/SamplesGaps/ct_db_update/$1';

define('RT_SAMPLES_GAPS_DB_DEL','rt-samples-gaps-db-del');
$route[RT_SAMPLES_GAPS_DB_DEL.'/(:any)'] = 'protocols/SamplesGaps/ct_db_delete/$1';

/* RT_SAMPLES_INFESTATION */
define('RT_SAMPLES_INFESTATION','rt-samples-infestation');
$route[RT_SAMPLES_INFESTATION]           = 'protocols/SamplesInfestation';
$route[RT_SAMPLES_INFESTATION.'/(:num)'] = 'protocols/SamplesInfestation';

define('RT_SAMPLES_INFESTATION_VW_INS','rt-samples-infestation-vw-ins');
$route[RT_SAMPLES_INFESTATION_VW_INS.'/(:any)'] = 'protocols/SamplesInfestation/ct_vw_insert/$1';

define('RT_SAMPLES_INFESTATION_DB_INS','rt-samples-infestation-db-ins');
$route[RT_SAMPLES_INFESTATION_DB_INS] = 'protocols/SamplesInfestation/ct_db_insert';

define('RT_SAMPLES_INFESTATION_VW_UPD','rt-samples-infestation-vw-upd');
$route[RT_SAMPLES_INFESTATION_VW_UPD.'/(:any)'] = 'protocols/SamplesInfestation/ct_vw_update/$1';

define('RT_SAMPLES_INFESTATION_DB_UPD','rt-samples-infestation-db-upd');
$route[RT_SAMPLES_INFESTATION_DB_UPD.'/(:any)'] = 'protocols/SamplesInfestation/ct_db_update/$1';

define('RT_SAMPLES_INFESTATION_DB_DEL','rt-samples-infestation-db-del');
$route[RT_SAMPLES_INFESTATION_DB_DEL.'/(:any)'] = 'protocols/SamplesInfestation/ct_db_delete/$1';

/* RT_SAMPLES_HOLES */
define('RT_SAMPLES_HOLES','rt-samples-holes');
$route[RT_SAMPLES_HOLES]           = 'protocols/SamplesHoles';
$route[RT_SAMPLES_HOLES.'/(:num)'] = 'protocols/SamplesHoles';

define('RT_SAMPLES_HOLES_VW_INS','rt-samples-holes-vw-ins');
$route[RT_SAMPLES_HOLES_VW_INS.'/(:any)'] = 'protocols/SamplesHoles/ct_vw_insert/$1';

define('RT_SAMPLES_HOLES_DB_INS','rt-samples-holes-db-ins');
$route[RT_SAMPLES_HOLES_DB_INS] = 'protocols/SamplesHoles/ct_db_insert';

define('RT_SAMPLES_HOLES_VW_UPD','rt-samples-holes-vw-upd');
$route[RT_SAMPLES_HOLES_VW_UPD.'/(:any)'] = 'protocols/SamplesHoles/ct_vw_update/$1';

define('RT_SAMPLES_HOLES_DB_UPD','rt-samples-holes-db-upd');
$route[RT_SAMPLES_HOLES_DB_UPD.'/(:any)'] = 'protocols/SamplesHoles/ct_db_update/$1';

define('RT_SAMPLES_HOLES_DB_DEL','rt-samples-holes-db-del');
$route[RT_SAMPLES_HOLES_DB_DEL.'/(:any)'] = 'protocols/SamplesHoles/ct_db_delete/$1';

/* RT_SAMPLES_DAMAGES */
define('RT_SAMPLES_DAMAGES','rt-samples-damages');
$route[RT_SAMPLES_DAMAGES]           = 'protocols/SamplesDamages';
$route[RT_SAMPLES_DAMAGES.'/(:num)'] = 'protocols/SamplesDamages';

define('RT_SAMPLES_DAMAGES_VW_INS','rt-samples-damages-vw-ins');
$route[RT_SAMPLES_DAMAGES_VW_INS.'/(:any)'] = 'protocols/SamplesDamages/ct_vw_insert/$1';

define('RT_SAMPLES_DAMAGES_DB_INS','rt-samples-damages-db-ins');
$route[RT_SAMPLES_DAMAGES_DB_INS] = 'protocols/SamplesDamages/ct_db_insert';

define('RT_SAMPLES_DAMAGES_VW_UPD','rt-samples-damages-vw-upd');
$route[RT_SAMPLES_DAMAGES_VW_UPD.'/(:any)'] = 'protocols/SamplesDamages/ct_vw_update/$1';

define('RT_SAMPLES_DAMAGES_DB_UPD','rt-samples-damages-db-upd');
$route[RT_SAMPLES_DAMAGES_DB_UPD.'/(:any)'] = 'protocols/SamplesDamages/ct_db_update/$1';

define('RT_SAMPLES_DAMAGES_DB_DEL','rt-samples-damages-db-del');
$route[RT_SAMPLES_DAMAGES_DB_DEL.'/(:any)'] = 'protocols/SamplesDamages/ct_db_delete/$1';

/* RT_SAMPLES_COMPOUNDS */
define('RT_SAMPLES_COMPOUNDS','rt-samples-compounds');
$route[RT_SAMPLES_COMPOUNDS]           = 'protocols/SamplesCompounds';
$route[RT_SAMPLES_COMPOUNDS.'/(:num)'] = 'protocols/SamplesCompounds';

define('RT_SAMPLES_COMPOUNDS_VW_INS','rt-samples-compounds-vw-ins');
$route[RT_SAMPLES_COMPOUNDS_VW_INS.'/(:any)/(:num)'] = 'protocols/SamplesCompounds/ct_vw_insert/$1/$2';

define('RT_SAMPLES_COMPOUNDS_DB_INS','rt-samples-compounds-db-ins');
$route[RT_SAMPLES_COMPOUNDS_DB_INS] = 'protocols/SamplesCompounds/ct_db_insert';

define('RT_SAMPLES_COMPOUNDS_VW_UPD','rt-samples-compounds-vw-upd');
$route[RT_SAMPLES_COMPOUNDS_VW_UPD.'/(:any)/(:num)'] = 'protocols/SamplesCompounds/ct_vw_update/$1/$2';

define('RT_SAMPLES_COMPOUNDS_DB_UPD','rt-samples-compounds-db-upd');
$route[RT_SAMPLES_COMPOUNDS_DB_UPD.'/(:any)'] = 'protocols/SamplesCompounds/ct_db_update/$1';

define('RT_SAMPLES_COMPOUNDS_DB_DEL','rt-samples-compounds-db-del');
$route[RT_SAMPLES_COMPOUNDS_DB_DEL.'/(:any)'] = 'protocols/SamplesCompounds/ct_db_delete/$1';

/* RT_SAMPLES_DISEASES */
define('RT_SAMPLES_DISEASES','rt-samples-diseases');
$route[RT_SAMPLES_DISEASES]           = 'protocols/SamplesDiseases';
$route[RT_SAMPLES_DISEASES.'/(:num)'] = 'protocols/SamplesDiseases';

define('RT_SAMPLES_DISEASES_VW_INS','rt-samples-diseases-vw-ins');
$route[RT_SAMPLES_DISEASES_VW_INS.'/(:any)'] = 'protocols/SamplesDiseases/ct_vw_insert/$1';

define('RT_SAMPLES_DISEASES_DB_INS','rt-samples-diseases-db-ins');
$route[RT_SAMPLES_DISEASES_DB_INS] = 'protocols/SamplesDiseases/ct_db_insert';

define('RT_SAMPLES_DISEASES_VW_UPD','rt-samples-diseases-vw-upd');
$route[RT_SAMPLES_DISEASES_VW_UPD.'/(:any)'] = 'protocols/SamplesDiseases/ct_vw_update/$1';

define('RT_SAMPLES_DISEASES_DB_UPD','rt-samples-diseases-db-upd');
$route[RT_SAMPLES_DISEASES_DB_UPD.'/(:any)'] = 'protocols/SamplesDiseases/ct_db_update/$1';

define('RT_SAMPLES_DISEASES_DB_DEL','rt-samples-diseases-db-del');
$route[RT_SAMPLES_DISEASES_DB_DEL.'/(:any)'] = 'protocols/SamplesDiseases/ct_db_delete/$1';

/* RT_SAMPLES_PESTS */
define('RT_SAMPLES_PESTS','rt-samples-pests');
$route[RT_SAMPLES_PESTS]           = 'protocols/SamplesPests';
$route[RT_SAMPLES_PESTS.'/(:num)'] = 'protocols/SamplesPests';

define('RT_SAMPLES_PESTS_VW_INS','rt-samples-pests-vw-ins');
$route[RT_SAMPLES_PESTS_VW_INS.'/(:any)'] = 'protocols/SamplesPests/ct_vw_insert/$1';

define('RT_SAMPLES_PESTS_DB_INS','rt-samples-pests-db-ins');
$route[RT_SAMPLES_PESTS_DB_INS] = 'protocols/SamplesPests/ct_db_insert';

define('RT_SAMPLES_PESTS_VW_UPD','rt-samples-pests-vw-upd');
$route[RT_SAMPLES_PESTS_VW_UPD.'/(:any)'] = 'protocols/SamplesPests/ct_vw_update/$1';

define('RT_SAMPLES_PESTS_DB_UPD','rt-samples-pests-db-upd');
$route[RT_SAMPLES_PESTS_DB_UPD.'/(:any)'] = 'protocols/SamplesPests/ct_db_update/$1';

define('RT_SAMPLES_PESTS_DB_DEL','rt-samples-pests-db-del');
$route[RT_SAMPLES_PESTS_DB_DEL.'/(:any)'] = 'protocols/SamplesPests/ct_db_delete/$1';

/* ------------------- */
/* RT_PROTOCOLS_RESULT */
/* ------------------- */
define('RT_PROTOCOLS_RESULT','rt-protocols-result');
$route[RT_PROTOCOLS_RESULT]           = 'protocols/ProtocolsResult';
$route[RT_PROTOCOLS_RESULT.'/(:num)'] = 'protocols/ProtocolsResult';

define('RT_PROTOCOLS_RESULT_REPORT','rt-protocols-result-report');
$route[RT_PROTOCOLS_RESULT_REPORT.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_report/$1';

define('RT_PROTOCOLS_RESULT_PROT','rt-protocols-result-prot');
$route[RT_PROTOCOLS_RESULT_PROT.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_prot/$1';

define('RT_PROTOCOLS_RESULT_ANALIZES','rt-protocols-result-analizes');
$route[RT_PROTOCOLS_RESULT_ANALIZES.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_analizes/$1';

define('RT_PROTOCOLS_RESULT_GROUP_SDH','rt-protocols-result-group-sdh');
$route[RT_PROTOCOLS_RESULT_GROUP_SDH.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_group_sdh/$1';

define('RT_PROTOCOLS_RESULT_STEMS','rt-protocols-result-stems');
$route[RT_PROTOCOLS_RESULT_STEMS.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_stems/$1';

define('RT_PROTOCOLS_RESULT_GAPS','rt-protocols-result-gaps');
$route[RT_PROTOCOLS_RESULT_GAPS.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_gaps/$1';

define('RT_PROTOCOLS_RESULT_INTERNODES','rt-protocols-result-internodes');
$route[RT_PROTOCOLS_RESULT_INTERNODES.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_internodes/$1';

define('RT_PROTOCOLS_RESULT_TILLERS','rt-protocols-result-tillers');
$route[RT_PROTOCOLS_RESULT_TILLERS.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_tillers/$1';

define('RT_PROTOCOLS_RESULT_INFESTATION','rt-protocols-result-infestation');
$route[RT_PROTOCOLS_RESULT_INFESTATION.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_infestation/$1';

define('RT_PROTOCOLS_RESULT_COMPOUNDS','rt-protocols-result-compounds');
$route[RT_PROTOCOLS_RESULT_COMPOUNDS.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_compounds/$1';

define('RT_PROTOCOLS_RESULT_DISEASES','rt-protocols-result-diseases');
$route[RT_PROTOCOLS_RESULT_DISEASES.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_diseases/$1';

define('RT_PROTOCOLS_RESULT_PESTS','rt-protocols-result-pests');
$route[RT_PROTOCOLS_RESULT_PESTS.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_pests/$1';

define('RT_PROTOCOLS_RESULT_CLIMATIC','rt-protocols-result-climatic');
$route[RT_PROTOCOLS_RESULT_CLIMATIC.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_climatic/$1';

define('RT_PROTOCOLS_RESULT_BIOMETRY_ST_GP','rt-protocols-rs-biometry-st-gp');
$route[RT_PROTOCOLS_RESULT_BIOMETRY_ST_GP.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_biometry_st_gp/$1';





/* RT_EXPORT_PDF_PROTOCOL */
define('RT_EXPORT_PDF_PROTOCOL','rt-export-pdf-protocol');
$route[RT_EXPORT_PDF_PROTOCOL.'/(:any)/(:num)'] = 'exports/Exports/rt_pdf_protocol/$1/$2';

$route['createchartpdf'] = 'exports/Exports/rt_pdf_protocol_teste_mpdf';



/* RT_EXPORT_TAB_PROTOCOL_ANALYZE_1 */
define('RT_EXPORT_TAB_PROTOCOL_ANALYZE_1','rt-export-tab-protocol-analyze-1');
$route[RT_EXPORT_TAB_PROTOCOL_ANALYZE_1.'/(:any)'] = "exports/ExportsTab/rt_tab_protocol_analyze_1/$1";



/* RT_PROTOCOLS_RESULT_MATH_DIC */
define('RT_PROTOCOLS_RESULT_MATH_DIC','rt-protocols-result-math-dic');
$route[RT_PROTOCOLS_RESULT_MATH_DIC.'/(:num)/(:any)'] = 'protocols/ProtocolsResult/ct_result_math_dic/$1/$2';

/* RT_PROTOCOLS_RESULT_MATH_DBA */
define('RT_PROTOCOLS_RESULT_MATH_DBA','rt-protocols-result-math-dba');
$route[RT_PROTOCOLS_RESULT_MATH_DBA.'/(:num)/(:any)'] = 'protocols/ProtocolsResult/ct_result_math_dba/$1/$2';

/* RT_PROTOCOLS_RESULT_MATH_DQL */
define('RT_PROTOCOLS_RESULT_MATH_DQL','rt-protocols-result-math-dql');
$route[RT_PROTOCOLS_RESULT_MATH_DQL.'/(:num)/(:any)'] = 'protocols/ProtocolsResult/ct_result_math_dql/$1/$2';





define('RT_PROTOCOLS_RESULT_ISOQUANTAS','rt-protocols-result-isoquantas');
$route[RT_PROTOCOLS_RESULT_ISOQUANTAS.'/(:any)'] = 'protocols/ProtocolsResult/ct_result_isoquantas/$1';

/*
| -------------------------------------------------------------------------
| ANALYSIS page
| -------------------------------------------------------------------------
*/

/* RT_QRY_RESEARCH LINES */
define('RT_QRY_RESEARCH_LINES','rt-qry-research-lines');
$route[RT_QRY_RESEARCH_LINES] = 'analysis/QryResearchLines';

/* RT_QRY_CHECKS_STATUS */
define('RT_QRY_CHECKS_STATUS','rt-qry-checks-status');
$route[RT_QRY_CHECKS_STATUS]            = 'analysis/QryChecksStatus';
$route[RT_QRY_CHECKS_STATUS.'/(:num)']  = 'analysis/QryChecksStatus';

/* RT_QRY_APPLIED_PRODUCTS */
define('RT_QRY_APPLIED_PRODUCTS','rt-qry-applied-products');
$route[RT_QRY_APPLIED_PRODUCTS]            = 'analysis/QryAppliedProducts';
$route[RT_QRY_APPLIED_PRODUCTS.'/(:num)']  = 'analysis/QryAppliedProducts';

/* RT_QRY_VARIETIES_ROYALTIES */
define('RT_QRY_VARIETIES_ROYALTIES','rt-qry-varieties-royalties');
$route[RT_QRY_VARIETIES_ROYALTIES]            = 'analysis/QryVarietiesRoyalties';
$route[RT_QRY_VARIETIES_ROYALTIES.'/(:num)']  = 'analysis/QryVarietiesRoyalties';

/* RT_QRY_WEATHERS */
define('RT_QRY_WEATHERS','rt-qry-weathers');
$route[RT_QRY_WEATHERS]           = 'analysis/QryWeathers/ct_weathers';
$route[RT_QRY_WEATHERS.'/(:num)'] = 'analysis/QryWeathers/ct_weathers';

/* RT_QRY_PROTOCOLS_ALERTS */
define('RT_QRY_PROTOCOLS_ALERTS','rt-qry-protocols-alerts');
$route[RT_QRY_PROTOCOLS_ALERTS]           = 'analysis/QryProtocolsAlerts';
$route[RT_QRY_PROTOCOLS_ALERTS.'/(:num)'] = 'analysis/QryProtocolsAlerts';

define('RT_QRY_PROTOCOLS_ALERTS_DB_UPD_AWARE','rt-qry-protocols-alerts-db-upd-aware');
$route[RT_QRY_PROTOCOLS_ALERTS_DB_UPD_AWARE.'/(:any)'] = 'analysis/QryProtocolsAlerts/ct_db_update_aware/$1';

/*
| -------------------------------------------------------------------------
| INTEGRATIONS page
| -------------------------------------------------------------------------
*/

/* RT_INTEGRATIONS_DAT */
define('RT_INTEGRATIONS_DAT','rt-integrations-dat');
$route[RT_INTEGRATIONS_DAT]           = 'integrations/IntegrationsDat';
$route[RT_INTEGRATIONS_DAT.'/(:num)'] = 'integrations/IntegrationsDat';

/* RT_INTEGRATIONS_DAT_SOILS_TEMPLATE */
define('RT_INTEGRATIONS_DAT_SOILS_TEMPLATE','rt-integrations-dat-soils-template');
$route[RT_INTEGRATIONS_DAT_SOILS_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_soils_template';

/* RT_INTEGRATIONS_DAT_SOILS_IMPORT */
define('RT_INTEGRATIONS_DAT_SOILS_IMPORT','rt-integrations-dat-soils-import');
$route[RT_INTEGRATIONS_DAT_SOILS_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_soils_import';

/* RT_INTEGRATIONS_DAT_VARIETIES_TEMPLATE */
define('RT_INTEGRATIONS_DAT_VARIETIES_TEMPLATE','rt-integrations-dat-varieties-template');
$route[RT_INTEGRATIONS_DAT_VARIETIES_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_varieties_template';

/* RT_INTEGRATIONS_DAT_VARIETIES_IMPORT */
define('RT_INTEGRATIONS_DAT_VARIETIES_IMPORT','rt-integrations-dat-varieties-import');
$route[RT_INTEGRATIONS_DAT_VARIETIES_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_varieties_import';

/* RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_TEMPLATE */
define('RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_TEMPLATE','rt-integrations-dat-geographical-units-template');
$route[RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_geographical_units_template';

/* RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_IMPORT */
define('RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_IMPORT','rt-integrations-dat-geographical-units-import');
$route[RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_geographical_units_import';

/* RT_INTEGRATIONS_DAT_TEAMS_TEMPLATE */
define('RT_INTEGRATIONS_DAT_TEAMS_TEMPLATE','rt-integrations-dat-teams-template');
$route[RT_INTEGRATIONS_DAT_TEAMS_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_teams_template';

/* RT_INTEGRATIONS_DAT_TEAMS_IMPORT */
define('RT_INTEGRATIONS_DAT_TEAMS_IMPORT','rt-integrations-dat-teams-import');
$route[RT_INTEGRATIONS_DAT_TEAMS_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_teams_import';

/* RT_INTEGRATIONS_DAT_PRODUCTS_TEMPLATE */
define('RT_INTEGRATIONS_DAT_PRODUCTS_TEMPLATE','rt-integrations-dat-products-template');
$route[RT_INTEGRATIONS_DAT_PRODUCTS_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_products_template';

/* RT_INTEGRATIONS_DAT_PRODUCTS_IMPORT */
define('RT_INTEGRATIONS_DAT_PRODUCTS_IMPORT','rt-integrations-dat-products-import');
$route[RT_INTEGRATIONS_DAT_PRODUCTS_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_products_import';

/* RT_INTEGRATIONS_DAT_COMPOUNDS_TEMPLATE */
define('RT_INTEGRATIONS_DAT_COMPOUNDS_TEMPLATE','rt-integrations-dat-compounds-template');
$route[RT_INTEGRATIONS_DAT_COMPOUNDS_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_compounds_template';

/* RT_INTEGRATIONS_DAT_COMPOUNDS_IMPORT */
define('RT_INTEGRATIONS_DAT_COMPOUNDS_IMPORT','rt-integrations-dat-compounds-import');
$route[RT_INTEGRATIONS_DAT_COMPOUNDS_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_compounds_import';

/* RT_INTEGRATIONS_DAT_DISEASES_TEMPLATE */
define('RT_INTEGRATIONS_DAT_DISEASES_TEMPLATE','rt-integrations-dat-diseases-template');
$route[RT_INTEGRATIONS_DAT_DISEASES_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_diseases_template';

/* RT_INTEGRATIONS_DAT_DISEASES_IMPORT */
define('RT_INTEGRATIONS_DAT_DISEASES_IMPORT','rt-integrations-dat-diseases-import');
$route[RT_INTEGRATIONS_DAT_DISEASES_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_diseases_import';

/* RT_INTEGRATIONS_DAT_PESTS_TEMPLATE */
define('RT_INTEGRATIONS_DAT_PESTS_TEMPLATE','rt-integrations-dat-pests-template');
$route[RT_INTEGRATIONS_DAT_PESTS_TEMPLATE] = 'integrations/IntegrationsDat/ct_export_dat_pests_template';

/* RT_INTEGRATIONS_DAT_PESTS_IMPORT */
define('RT_INTEGRATIONS_DAT_PESTS_IMPORT','rt-integrations-dat-pests-import');
$route[RT_INTEGRATIONS_DAT_PESTS_IMPORT] = 'integrations/IntegrationsDat/ct_integrations_dat_pests_import';

/* -------------------------------------------------------------------------- */

/* RT_CALL_INTEGRATIONS_SPL */
define('RT_CALL_INTEGRATIONS_SPL','rt-call-integrations-spl');
$route[RT_CALL_INTEGRATIONS_SPL.'/(:num)'] = 'integrations/IntegrationsSpl/ct_call_integrations_spl/$1';

/* RT_INTEGRATIONS_SPL */
define('RT_INTEGRATIONS_SPL','rt-integrations-spl');
$route[RT_INTEGRATIONS_SPL]           = 'integrations/IntegrationsSpl';
$route[RT_INTEGRATIONS_SPL.'/(:num)'] = 'integrations/IntegrationsSpl';

/* RT_INTEGRATIONS_SPL_ANALYZE_TEMPLATE */
define('RT_INTEGRATIONS_SPL_ANALYZE_TEMPLATE','rt-integrations-samples-analyze-template');
$route[RT_INTEGRATIONS_SPL_ANALYZE_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_analyze_template';

/* RT_INTEGRATIONS_SPL_ANALYZE_IMPORT */
define('RT_INTEGRATIONS_SPL_ANALYZE_IMPORT','rt-integrations-samples-analyze-import');
$route[RT_INTEGRATIONS_SPL_ANALYZE_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_analyze_import';

/* RT_INTEGRATIONS_SPL_WEIGHT_TEMPLATE */
define('RT_INTEGRATIONS_SPL_WEIGHT_TEMPLATE','rt-integrations-samples-weight-template');
$route[RT_INTEGRATIONS_SPL_WEIGHT_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_weight_template';

/* RT_INTEGRATIONS_SPL_WEIGHT_IMPORT */
define('RT_INTEGRATIONS_SPL_WEIGHT_IMPORT','rt-integrations-samples-weight-import');
$route[RT_INTEGRATIONS_SPL_WEIGHT_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_weight_import';

/* RT_INTEGRATIONS_SPL_STEMS_TEMPLATE */
define('RT_INTEGRATIONS_SPL_STEMS_TEMPLATE','rt-integrations-samples-stems-template');
$route[RT_INTEGRATIONS_SPL_STEMS_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_stems_template';

/* RT_INTEGRATIONS_SPL_STEMS_IMPORT */
define('RT_INTEGRATIONS_SPL_STEMS_IMPORT','rt-integrations-samples-stems-import');
$route[RT_INTEGRATIONS_SPL_STEMS_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_stems_import';

/* RT_INTEGRATIONS_SPL_HEIGHT_TEMPLATE */
define('RT_INTEGRATIONS_SPL_HEIGHT_TEMPLATE','rt-integrations-samples-height-template');
$route[RT_INTEGRATIONS_SPL_HEIGHT_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_height_template';

/* RT_INTEGRATIONS_SPL_HEIGHT_IMPORT */
define('RT_INTEGRATIONS_SPL_HEIGHT_IMPORT','rt-integrations-samples-height-import');
$route[RT_INTEGRATIONS_SPL_HEIGHT_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_height_import';

/* RT_INTEGRATIONS_SPL_DIAMETER_TEMPLATE */
define('RT_INTEGRATIONS_SPL_DIAMETER_TEMPLATE','rt-integrations-samples-diameter-template');
$route[RT_INTEGRATIONS_SPL_DIAMETER_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_diameter_template';

/* RT_INTEGRATIONS_SPL_DIAMETER_IMPORT */
define('RT_INTEGRATIONS_SPL_DIAMETER_IMPORT','rt-integrations-samples-diameter-import');
$route[RT_INTEGRATIONS_SPL_DIAMETER_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_diameter_import';

/* RT_INTEGRATIONS_SPL_INTERNODES_TEMPLATE */
define('RT_INTEGRATIONS_SPL_INTERNODES_TEMPLATE','rt-integrations-samples-internodes-template');
$route[RT_INTEGRATIONS_SPL_INTERNODES_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_internodes_template';

/* RT_INTEGRATIONS_SPL_INTERNODES_IMPORT */
define('RT_INTEGRATIONS_SPL_INTERNODES_IMPORT','rt-integrations-samples-internodes-import');
$route[RT_INTEGRATIONS_SPL_INTERNODES_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_internodes_import';

/* RT_INTEGRATIONS_SPL_FLOWERING_TEMPLATE */
define('RT_INTEGRATIONS_SPL_FLOWERING_TEMPLATE','rt-integrations-samples-flowering-template');
$route[RT_INTEGRATIONS_SPL_FLOWERING_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_flowering_template';

/* RT_INTEGRATIONS_SPL_FLOWERING_IMPORT */
define('RT_INTEGRATIONS_SPL_FLOWERING_IMPORT','rt-integrations-samples-flowering-import');
$route[RT_INTEGRATIONS_SPL_FLOWERING_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_flowering_import';

/* RT_INTEGRATIONS_SPL_PITH_TEMPLATE */
define('RT_INTEGRATIONS_SPL_PITH_TEMPLATE','rt-integrations-samples-pith-template');
$route[RT_INTEGRATIONS_SPL_PITH_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_pith_template';

/* RT_INTEGRATIONS_SPL_PITH_IMPORT */
define('RT_INTEGRATIONS_SPL_PITH_IMPORT','rt-integrations-samples-pith-import');
$route[RT_INTEGRATIONS_SPL_PITH_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_pith_import';

/* RT_INTEGRATIONS_SPL_TILLERS_TEMPLATE */
define('RT_INTEGRATIONS_SPL_TILLERS_TEMPLATE','rt-integrations-samples-tillers-template');
$route[RT_INTEGRATIONS_SPL_TILLERS_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_tillers_template';

/* RT_INTEGRATIONS_SPL_TILLERS_IMPORT */
define('RT_INTEGRATIONS_SPL_TILLERS_IMPORT','rt-integrations-samples-tillers-import');
$route[RT_INTEGRATIONS_SPL_TILLERS_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_tillers_import';

/* RT_INTEGRATIONS_SPL_INFESTATION_TEMPLATE */
define('RT_INTEGRATIONS_SPL_INFESTATION_TEMPLATE','rt-integrations-samples-infestation-template');
$route[RT_INTEGRATIONS_SPL_INFESTATION_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_infestation_template';

/* RT_INTEGRATIONS_SPL_INFESTATION_IMPORT */
define('RT_INTEGRATIONS_SPL_INFESTATION_IMPORT','rt-integrations-samples-infestation-import');
$route[RT_INTEGRATIONS_SPL_INFESTATION_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_infestation_import';

/* RT_INTEGRATIONS_SPL_HOLES_TEMPLATE */
define('RT_INTEGRATIONS_SPL_HOLES_TEMPLATE','rt-integrations-samples-holes-template');
$route[RT_INTEGRATIONS_SPL_HOLES_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_holes_template';

/* RT_INTEGRATIONS_SPL_HOLES_IMPORT */
define('RT_INTEGRATIONS_SPL_HOLES_IMPORT','rt-integrations-samples-holes-import');
$route[RT_INTEGRATIONS_SPL_HOLES_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_holes_import';

/* RT_INTEGRATIONS_SPL_DAMAGES_TEMPLATE */
define('RT_INTEGRATIONS_SPL_DAMAGES_TEMPLATE','rt-integrations-samples-damages-template');
$route[RT_INTEGRATIONS_SPL_DAMAGES_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_damages_template';

/* RT_INTEGRATIONS_SPL_DAMAGES_IMPORT */
define('RT_INTEGRATIONS_SPL_DAMAGES_IMPORT','rt-integrations-samples-damages-import');
$route[RT_INTEGRATIONS_SPL_DAMAGES_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_damages_import';

/* RT_INTEGRATIONS_SPL_COMPOUNDS_TEMPLATE */
define('RT_INTEGRATIONS_SPL_COMPOUNDS_TEMPLATE','rt-integrations-samples-compounds-template');
$route[RT_INTEGRATIONS_SPL_COMPOUNDS_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_compounds_template';

/* RT_INTEGRATIONS_SPL_COMPOUNDS_IMPORT */
define('RT_INTEGRATIONS_SPL_COMPOUNDS_IMPORT','rt-integrations-samples-compounds-import');
$route[RT_INTEGRATIONS_SPL_COMPOUNDS_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_compounds_import';

/* RT_INTEGRATIONS_SPL_DISEASES_TEMPLATE */
define('RT_INTEGRATIONS_SPL_DISEASES_TEMPLATE','rt-integrations-samples-diseases-template');
$route[RT_INTEGRATIONS_SPL_DISEASES_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_diseases_template';

/* RT_INTEGRATIONS_SPL_DISEASES_IMPORT */
define('RT_INTEGRATIONS_SPL_DISEASES_IMPORT','rt-integrations-samples-diseases-import');
$route[RT_INTEGRATIONS_SPL_DISEASES_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_diseases_import';

/* RT_INTEGRATIONS_SPL_PESTS_TEMPLATE */
define('RT_INTEGRATIONS_SPL_PESTS_TEMPLATE','rt-integrations-samples-pests-template');
$route[RT_INTEGRATIONS_SPL_PESTS_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_pests_template';

/* RT_INTEGRATIONS_SPL_PESTS_IMPORT */
define('RT_INTEGRATIONS_SPL_PESTS_IMPORT','rt-integrations-samples-pests-import');
$route[RT_INTEGRATIONS_SPL_PESTS_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_pests_import';

/* RT_INTEGRATIONS_SPL_GAPS_TEMPLATE */
define('RT_INTEGRATIONS_SPL_GAPS_TEMPLATE','rt-integrations-samples-gaps-template');
$route[RT_INTEGRATIONS_SPL_GAPS_TEMPLATE] = 'integrations/IntegrationsSpl/ct_export_samples_gaps_template';

/* RT_INTEGRATIONS_SPL_GAPS_IMPORT */
define('RT_INTEGRATIONS_SPL_GAPS_IMPORT','rt-integrations-samples-gaps-import');
$route[RT_INTEGRATIONS_SPL_GAPS_IMPORT] = 'integrations/IntegrationsSpl/ct_integrations_samples_gaps_import';
