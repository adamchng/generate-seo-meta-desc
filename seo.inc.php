<?php

function canonical($u) {
	if($_SERVER["SCRIPT_URI"] == $u) {
		return 0;
	} else {
		return '<link rel="canonical" href="' . $u . '" />';
	}
}

// this function retrieves the page title
function Page_Title($f,$id) {
        global $DOCRoot;
        $Data = GetDataFile($f);
        //debug($Data[$id]);
        if ($f == 'data/certcourses.dat') {
                $Title = $Data[$id]['Desc'] . ' Certification and Training in NYC, DC, Vegas, Philadelphia & Online';
        } elseif ($f == 'data/bootcamp_package.dat') {
                $Title = $Data[$id]['FullDesc'] . ' Training Package & Certification Exams in NYC, DC, Vegas, Philadelphia & Online';
        } elseif ($f == 'data/categories.dat') {
                $Title = $Data[$id]['Description'] . ' Course Category';
        } elseif ($f == 'data/vendor.dat') {
                $Title = $Data[$id]['Description'] . ' Vendor Courses';
        } elseif ($f == 'data/vendesc.dat') {
                $Title = $Data[$id]['Description'] . ' Vendor Training & Certification Exam in NYC, DC, Vegas, Philadelphia & Online';
        } elseif ($f == 'data/product_package_map.dat') {
                $Title = $Data[$id]['ProductName'] . ' Training Courses, Certification Exams in NYC, DC, Vegas, Philadelphia & Online';
        } elseif ($f == 'data/courses.dat') {
                $Title = $Data[$id]['Title'] . ' Training Course, Certification Exam in NYC, DC, Vegas, Philadelphia & Online';
        } else {
                $Title = (isset($Data[$id]['Page_Title']))?$Data[$id]['Page_Title']:$Data[$id]['Title'];
                $Title .= ' Training and Certification in NYC, DC, Vegas, Philadelphia & Online';
        }
        if ($Title == "") {
                $Title = 'IT & Soft Skills Computer Course Training, Certification Exams, Classes in NYC, DC, Vegas, Philadelphia & Online';
        }
        return $Title;
}

// adam 20090826 New SEO functions
function seo_title($f,$id, $pagetype,$backup_title=0) {
        $Data = GetDataFile($f);
        /*
        print "<pre>";
        print_r($Data[$id]);
        print "</pre>";
        */

        if ($Data[$pagetype][$id][MetaTitle]) {
                return "{$Data[$pagetype][$id][MetaTitle]}";
        } else {
                # some data files have different format
                if ( ($pagetype == 'Package' || $pagetype == 'Bootcamp' || $pagetype == 'Vendor' || $pagetype == 'Product' || $pagetype == 'Course' || $pagetype == 'Category') && $Data[$id][MetaTitle]) {
                        return "{$Data[$id][MetaTitle]}";
                }

                # 1st option, return backup_title if available
                if ($backup_title) {
                        return $backup_title;
                } else {
                        # last option, return standard title
                        if ($pagetype == 'CareerTrack') {
                                return 'Learning Plan for IT Computer Training, IT Career Training, Computer Career Classes in New York, NYC and Las Vegas, Nevada - NetCom Learning';
                        } else if ($pagetype == 'Certification') {
                                return 'IT Certification,Computer Training Certifications,Computer Classes Certifications in New York, NYC and Las Vegas, Nevada - NetCom Learning';
                        } else if ($pagetype == 'Product') {
                                return 'Product Training, Product Courses, Authorized Product Classes in New York, NYC and Las Vegas, Nevada';
                        } else if ($pagetype == 'Vendor') {
                                return 'Vendor Training, Vendor Courses, Authorized Vendor Classes in New York, NYC and Las Vegas, Nevada';
                        } else if ($pagetype == 'Category') {
                                return 'IT Course Training, IT Course Certification, Authorized Computer Courses, computer training in New York, NYC and Las Vegas, Nevada';
                        } else if ($pagetype == 'Course') {
                                return 'Course & Certification Exam in NY, NV, DC & Online';
                        } else if ($pagetype == 'Package') {
                                return 'IT Training Packages,Computer Training Packages,Computer Class Packages in New York, NYC and Las Vegas, Nevada - NetCom Learning';
                        } else if ($pagetype == 'Bootcamp') {
                                return 'IT Bootcamp Packages,IT Boot camp Training Packages,Computer boot camp, computer training bootcamp in New York, NYC and Las Vegas, Nevada - NetCom Learning';
                        }
                }
        }
}

function seo_keywords($f,$id, $pagetype) {
        $Data = GetDataFile($f);
        if ($Data[$pagetype][$id][MetaKeywords]) {
                return "{$Data[$pagetype][$id][MetaKeywords]}";
        } else {
                # some data files have different format
                if ( ($pagetype == 'Package' || $pagetype == 'Bootcamp' || $pagetype == 'Vendor' || $pagetype == 'Product' || $pagetype == 'Course' || $pagetype == 'Category') && $Data[$id][MetaKeywords]) {
                        return "{$Data[$id][MetaKeywords]}";
                }

                # return standard keywords
                if ($pagetype == 'CareerTrack') {
                        return 'Learning Plan, IT Career Training, Career Testimonials, Jobs and Salaries, IT Career Tracks, IT Certification Tracks, Computer Certification Careers, IT Certification Careers, Computer Certification Training Tracks';
                } else if ($pagetype == 'Certification') {
                        return 'IT Certification, IT Certification Training, IT Certification Exams, Computer Certification Training, Computer Certification Exams, Computer Training Certification, computer class certification';
                } else if ($pagetype == 'Product') {
                        return 'Product Training, Product Certification, Product training classes, Product Certification packages';
                } else if ($pagetype == 'Vendor') {
                        return 'Vendor Training, Vendor Certification, Vendor training classes, Vendor Certification packages';
                } else if ($pagetype == 'Category') {
                        return 'IT Courses, IT Courses Training, Course Certification, IT training courses, IT Certification courses, computer courses, computer certification courses, computer training courses';
                } else if ($pagetype == 'Course') {
                        return 'IT Courses, IT Courses Training, Course Certification, IT training courses, IT Certification courses, computer courses, computer certification courses, computer training courses';
                } else if ($pagetype == 'Package') {
                        return 'IT Training Packages, IT Certification Packages, Computer class packages, computer training packages, Computer Certification packages';
                } else if ($pagetype == 'Bootcamp') {
                        return 'IT Boot camp Packages, IT Certification bootcamps, Computer bootcamp packages, computer training boot camps, Bootcamp Certification Packages';
                }
        }
}

function seo_description($f,$id, $pagetype) {
        $Data = GetDataFile($f);
        if ($Data[$pagetype][$id][MetaDescription]) {
                return "{$Data[$pagetype][$id][MetaDescription]}";
        } else {
                # some data files have different format
                if (($pagetype == 'Package' || $pagetype == 'Bootcamp' || $pagetype == 'Vendor' || $pagetype == 'Product' || $pagetype == 'Course' || $pagetype == 'Category') && $Data[$id][MetaDescription]) {
                        return "{$Data[$id][MetaDescription]}";
                }

                # return standard title
                if ($pagetype == 'CareerTrack') {
                        return 'NetCom Learning offers specific training in various IT Career Tracks in both our midtown New York, NYC location and Las Vegas location as well as Live Online Classes. These IT Career Tracks are taught by industry certified, experienced instructors and offer an easy path to certification in various specialized IT Career tracks such as Microsoft, Cisco, CompTIA, AutoDesk, Oracle and Adobe.';
                } else if ($pagetype == 'Certification') {
                        return 'NetCom Learning offers various Authorized Certification training and exams in our convenient midtown NYC training facility as well as our Las Vegas, Nevada training facility. Live Online certification training over the internet is also offered by NetCom. These authorized certification training courses are taught by experienced and certified subject matter experts.';
                } else if ($pagetype == 'Product') {
                        return 'NetCom offers various authorized Product Training courses at our NYC midtown New York and Las Vegas, Nevada facilities. These authorized product training classes and courses are taught by certified, experienced instructors who are experts in the relevant products.';
                } else if ($pagetype == 'Vendor') {
                        return 'NetCom Learning offers various authorized vendor Training, Certifications, Courses and Classes at our midtown New York, NYC and Las Vegas, Nevada facilities as well as for live online training. These authorized vendor training and classes are taught by experienced, certified IT instructors and experts.';
                } else if ($pagetype == 'Category') {
                        return 'NetCom offers various authorized IT Training Courses, IT Course Certifications and Computer Training Courses at our midtown New York, NYC and Las Vegas, Nevada facilities as well as for live online training. These authorized IT training courses are taught by experienced and certified IT instructors and experts.';
                } else if ($pagetype == 'Course') {

			$q = "SELECT CourseFullDescription,VendorDescription FROM vwCourseVendorMap WHERE CourseID = '$id'";
			$qrh = mssql_query($q);
			if(mssql_num_rows($qrh)) {
				$row = mssql_fetch_assoc($qrh);
				return MetaDescOne($row[CourseFullDescription],$row[VendorDescription]);
			} else {
                        	return 'NetCom Learning offers various authorized IT Training Courses, IT Course Certifications and Computer Training Courses at our midtown New York, NYC and Las Vegas, Nevada facilities as well as for live online training. These authorized IT training courses are taught by experienced and certified IT instructors.';
			}

                } else if ($pagetype == 'Package') {

                        $q = "SELECT PackageFullDesc,VendorDescription FROM vwPackageVendorMap WHERE PackageID = '$id'";
                        $qrh = mssql_query($q);
                        if(mssql_num_rows($qrh)) {
                                $row = mssql_fetch_assoc($qrh);
                                return MetaDescOne($row[PackageFullDesc],$row[VendorDescription]);
                        } else {
                        	return 'NetCom Learning offers various customized IT Training and Certification Packages as well as Computer class and course packages in our midtown New York, NYC and Las Vegas, Nevada facilities as well as for live online training. These IT training packages are taught by certified and experienced IT instructors.';
			}


                } else if ($pagetype == 'Bootcamp') {

                        $q = "SELECT PackageFullDesc,VendorDescription FROM vwPackageVendorMap WHERE PackageID = '$id'";
                        $qrh = mssql_query($q);
                        if(mssql_num_rows($qrh)) {
                                $row = mssql_fetch_assoc($qrh);
                                return MetaDescTwo($row[PackageFullDesc],$row[VendorDescription]);
                        } else {
                        	return 'NetCom Learning offers various customized IT Bootcamp Training and Certification Packages as well as Computer class and course boot camps in our midtown New York, NYC and Las Vegas, Nevada facilities as well as for live online training. These IT training bootcamps are taught by certified and experienced IT instructors in a fast paced manner geared to certify and enhance our students learning ability rapidly.';
			}

                }
        }
}

//meta tag function
function Meta_Tags($f,$id) {
        global $DOCRoot;
        $Data = GetDataFile($f);
        //debug($Data[$id]);
        //ProductMetaKeywords
        $keywords = $Data[$id][ProductMetaKeywords];
        if ($keywords == "") {
                $keywords = " ";
        }
        return $keywords;

}

// Optimized version - return all three based on type.
function seo_tkd($id,$type) {
	switch($type) {
		case 'Course':
			$seo = seo_tkd_course($id);
			break;
		
		case 'Package':

			break;

                case 'Bootcamp':

                        break;

                case 'Certification':

                        break;

                case 'Product':

                        break;

                case 'CareerTrack':

                        break;

                case 'Vendor':

                        break;

                case 'Category':

                        break;

		default:
			break;
	}
	return array($title,$keywords,$desc);
}

function seo_tkd_webinar($id) {
        $q = "SELECT * FROM vwSEOPackage WHERE PackageID = '$id'";
        $qrh = mssql_query($q);
        if(mssql_num_rows($qrh)) {
                $row = mssql_fetch_assoc($qrh);

                if($row[VendorID] == 62 || $row[VendorID] == 2) {
                        $row[VendorDescription] = 'Microsoft';
                }
                if($row[VendorID] == 41) {
                        $row[VendorDescription] = 'NetCom';
                }

                if($row[MetaTitle]) {
                        $title = $row[MetaTitle];
                } else {
                        $title = $row[PackageFullDesc] . " | Free IT Technology Online Webinar";
                }

                if($row[MetaKeywords]) {
                        $keywords = $row[MetaKeywords];
                } else {
                        $v = $row[VendorDescription];
                        $t = $row[PackageFullDesc];
                        $keywords = "$v IT Training Courses,$v IT Classes,$v Course Certification, $v computer course, $t new features, $v computer training, $v free webinars, $v workshops, $t introduction, $v events";
                }

                if($row[MetaDescription]) {
                        $desc = $row[MetaDescription];
                } else {
                        $desc = "Enroll and take part in a Free IT Webinar by NetCom Learning for $row[PackageFullDesc]";
                }
        } else {
                $title = 'NetCom Learning Webinar and Events in NYC, Las Vegas,NV, Washington,DC, Arlington,VA, Philadelphia,PA and Live Online';
                $keywords = 'IT Webinars, FREE IT workshops, Free online webinars, Free IT course introduction, Free IT events';
		$desc = 'Enroll and take part in a Free IT Webinar by NetCom Learning';
        }
        return array($title,$keywords,$desc);
}

function seo_tkd_package($id) {
        $q = "SELECT * FROM vwSEOPackage WHERE PackageID = '$id'";
        $qrh = mssql_query($q);
        if(mssql_num_rows($qrh)) {
                $row = mssql_fetch_assoc($qrh);

                if($row[VendorID] == 62 || $row[VendorID] == 2) {
                        $row[VendorDescription] = 'Microsoft';
                }
                if($row[VendorID] == 41) {
                        $row[VendorDescription] = 'NetCom';
                }

                if($row[MetaTitle]) {
                        $title = $row[MetaTitle];
			$fd = $row[MetaTitle];
                } else {
                        $title = $row[PackageFullDesc] . " Training Course | Certification Exam";
			$fd = $row[PackageFullDesc];
                }

                if($row[MetaKeywords]) {
                        $keywords = $row[MetaKeywords];
                } else {
                        $v = $row[VendorDescription];
                        $t = $row[PackageFullDesc];
                        $keywords = "$v IT Training Courses, $v IT Classes, $t cost price, $t satv vouchers, $v certification course, $v computer course, $t schedules, $v computer training, $t certification exam";
                }

                if($row[MetaDescription]) {
                        $desc = $row[MetaDescription];
                } else {
                        $desc = MetaDescOne($row[PackageFullDesc],$row[VendorDescription]);
                }

        } else {

		$q = "SELECT        tbl_Package_New.PackageID, tbl_Package_New.FullDesc, tbl_Package_New.Status, tbl_PackageOverview.MetaTitle, tbl_PackageOverview.MetaKeywords, 
                         tbl_PackageOverview.MetaDescription
			FROM            tbl_Package_New LEFT OUTER JOIN
                         tbl_PackageOverview ON tbl_Package_New.PackageID = tbl_PackageOverview.PackageID
			WHERE        (tbl_Package_New.PackageID = N'$id')";
		$qrh = mssql_query($q);
		if(mssql_num_rows($qrh)) {
			$row = mssql_fetch_assoc($qrh);

                	if($row[MetaTitle]) {
                       		$title = $row[MetaTitle];
				$fd = $row[MetaTitle];
                	} else {
                       		$title = $row[FullDesc] . " Training Course | Certification Exam";
				$fd = $row[FullDesc];
                	}
				
                	if($row[MetaKeywords]) {
                       		$keywords = $row[MetaKeywords];
                	} else {
                       		$t = $row[FullDesc];
                       		$keywords = "$t cost price, $t satv vouchers, $t schedules, $t certification exam";
                	}


			if($row[Status] == 'Active') {
                                if($row[MetaDescription]) {
                                        $desc = $row[MetaDescription];
                                } else {
                                        $desc = $row[FullDesc] . ' training course has changed. Please see our other similar offerings.';
                                }
			} else {
                		if($row[MetaDescription]) {
                        		$desc = $row[MetaDescription];
                		} else {
                        		$desc = $row[FullDesc] . ' training course has been retired.';
                		}
			}

		} else {
			$fd = '';
                	$title = 'NetCom Learning Training Courses, Certification Exams in NYC, Las Vegas,NV, Washington,DC, Arlington,VA, Philadelphia,PA and Live Online';
                	$keywords = 'IT Courses, IT Classes, IT Certification, IT course pricing, computer training courses, IT computer training schedules, IT training provider';
                	$desc = MetaDescOne('Microsoft,Cisco,Adobe,AutoCAD,PHP,ITIL,Programming,Server,CompTIA,CEH,Security,Virtualization technologies','NetCom');
		}
        }
        return array($title,$keywords,$desc,$fd);
}


function seo_tkd_course($id) {
	$q = "SELECT * FROM vwSEOCourse WHERE CourseID = '$id'";
	$qrh = mssql_query($q);
	if(mssql_num_rows($qrh)) {
		$row = mssql_fetch_assoc($qrh);

                if($row[VendorID] == 62 || $row[VendorID] == 2) {
                        $row[VendorDescription] = 'Microsoft';
                }
                if($row[VendorID] == 41) {
                        $row[VendorDescription] = 'NetCom';
                }

		if($row[MetaTitle]) {
			$title = $row[MetaTitle];
			$fd = $row[MetaTitle];
		} else {
			$title = $row[CourseFullDescription] . " Training Course | Certification Exam";
			$fd = $row[CourseFullDescription];
		}

                if($row[MetaKeywords]) {
			$keywords = $row[MetaKeywords];
                } else {
			$v = $row[VendorDescription];
			$t = $row[CourseFullDescription];
			$keywords = "$v IT Training Courses,$v IT Classes, $t cost price, $t satv vouchers, $v certification course, $v computer course, $t schedules, $v computer training, $t certification exam";
                }

                if($row[MetaDescription]) {
			$desc = $row[MetaDescription];	
                } else {
			$desc = MetaDescOne($row[CourseFullDescription],$row[VendorDescription]);
                }
	} else {
		$fd = '';
		$title = 'NetCom Learning Training Course, Certification Exams in NYC, Las Vegas,NV, Washington,DC, Arlington,VA, Philadelphia,PA and Live Online';
		$keywords = 'IT Courses, IT Classes, IT Certification, IT course pricing, computer training courses, IT computer training schedules, IT training provider';
		$desc = MetaDescOne('Microsoft,Cisco,Adobe,AutoCAD,PHP,ITIL,Programming,Server,CompTIA,CEH,Security,Virtualization technologies','NetCom');
	}
	return array($title,$keywords,$desc,$fd);
}


function seo_tkd2($id,$tbl,$type) {
        if(is_numeric($id)) {
                dbconnect();
                $q = "SELECT MetaTitle,MetaKeywords,MetaDescription FROM $tbl WHERE $type = $id";
                $qrh = mssql_query($q);
                if(mssql_num_rows($qrh)) {
                        $row = mssql_fetch_assoc($qrh);
                        if($row[MetaTitle]) {
                                $a = array("$row[MetaTitle]","$row[MetaKeywords]","$row[MetaDescription]");
                                return $a;
                        } else {
                                // does not exist, let's take the title and process the TKD
                                $Desc = array('PackageID'=>'FullDesc');
                                $Tbl = array('PackageID'=>'tbl_Package_New');

                                $q = "SELECT $Desc[$type] FROM $Tbl[$type] WHERE $type = $id";
                                $qrh = mssql_query($q);
                                if(mssql_num_rows($qrh)) {
                                        // stop here
                                } else {
                                        $default = 1;
                                }
                        }
                } else {
                        $default = 1;
                }

        } else {
                $default = 1;
        }

        if($default) {
                $a = array('NetCom Learning IT Training, Certification, Courses, Boot camps, Classes','it training,it certification,it courses,it classes,it bootcamps','NetCom Learning is an industry leader and provider of computer training and certfication courses in New York City, NYC, Washington DC, Arlington, Philadelphia, Las Vegas and Live Online');
                return $a;
        }
}

function MetaDescOne($txt,$vendor = 'Microsoft') {
        $a = array('Get trained in','Get certified in','Train in','Take your training in','Learn','Advance your learning in','Advance your skills in','Continue your lifelong training in');
        $r1 = mt_rand(0,7);

        $b = array('with NetCom Learning','with NetCom','at NetCom','with NetCom as your Learning Partner','at NetCom Learning');
        $r2 = mt_rand(0,4);

        $c = array('We use','NetCom uses','NetCom Learning uses','We only use','We provide','We only provide','NetCom only provides','NetCom provides','NetCom Learning only provides','NetCom Learning provides');
        $r3 = mt_rand(0,9);

        $d = array('authorized','certified','proper','unique','official','vendor-endorsed','vendor-sanctioned','approved');
        $r4 = mt_rand(0,7);

        $e = array('curriculum','books','courseware','courseware materials','learning materials','learning courseware','provided materials');
        $r5 = mt_rand(0,6);

        $f = array('certified','expert','experienced','brilliant','authorized','the best');
        $r6 = mt_rand(0,5);

        $g = array('instructors','trainers','subject matter experts','teachers','experts');
        $r7 = mt_rand(0,4);

        $h = array('flexible','guaranteed to run','guaranteed','public and custom','easy');
        $r8 = mt_rand(0,4);

        $i = array('friendly and comfortable','friendly','comfortable','relaxing','optimized-for-learning','state of the art');
        $r9 = mt_rand(0,5);

        $j = array('locations','training centers','environments','schools','labs','classrooms','facilities');
        $r10 = mt_rand(0,6);

        return "$a[$r1] $txt $b[$r2]. $c[$r3] $d[$r4] $vendor $e[$r5] and $f[$r6] $vendor $g[$r7], with $h[$r8] schedules in our $i[$r9] $j[$r10] in NYC midtown New York, Las Vegas, Nevada, Arlington, Virginia, Washington DC, Philadelphia, Pennsylvania as well as live online.";
}

// boot camps
function MetaDescTwo($txt,$vendor = 'Microsoft') {
        $a = array('Enroll in','Take','Learn','Advance your learning with our','Advance your skills with our','Continue your lifelong training with our');
        $r1 = mt_rand(0,5);

        $b = array('boot camp with NetCom Learning','bootcamp with NetCom','boot camp at NetCom','boot camp with NetCom as your Learning Partner','bootcamp at NetCom Learning');
        $r2 = mt_rand(0,4);

        $c = array('We use','NetCom uses','NetCom Learning uses','We only use','We provide','We only provide','NetCom only provides','NetCom provides','NetCom Learning only provides','NetCom Learning provides');
        $r3 = mt_rand(0,9);

        $d = array('authorized','certified','proper','unique','official','vendor-endorsed','vendor-sanctioned','approved');
        $r4 = mt_rand(0,7);

        $e = array('curriculum','books','courseware','courseware materials','learning materials','learning courseware','provided materials');
        $r5 = mt_rand(0,6);

        $f = array('certified','expert','experienced','brilliant','authorized','the best');
        $r6 = mt_rand(0,5);

        $g = array('instructors','trainers','subject matter experts','teachers','experts');
        $r7 = mt_rand(0,4);

        $h = array('flexible','guaranteed to run','guaranteed','public and custom','easy');
        $r8 = mt_rand(0,4);

        $i = array('friendly and comfortable','friendly','comfortable','relaxing','optimized-for-learning','state of the art');
        $r9 = mt_rand(0,5);

        $j = array('locations','training centers','environments','schools','labs','classrooms','facilities');
        $r10 = mt_rand(0,6);

        return "$a[$r1] $txt $b[$r2]. $c[$r3] $d[$r4] $vendor $e[$r5] and $f[$r6] $vendor $g[$r7], with $h[$r8] schedules in our $i[$r9] $j[$r10] in NYC midtown New York, Las Vegas, Nevada, Arlington, Virginia, Washington DC, Philadelphia, Pennsylvania as well as live online.";
}

// Obtain your Security+ certification by taking an instructor-led training course with NetCom Learning in our locations at NYC, Las Vegas, Washington DC, Philadelphia as well as live online.
// Achieve your CTT+ certification by taking our expert-led training course at NetCom Learning  locations in NYC, Las Vegas, Washington DC, Philadelphia as well as live online
// Get your CompTIA CASP certification by taking our instructor-led training course at NetCom Learning  locations in NYC, Las Vegas, Washington DC, Philadelphia as well as live online
?>
