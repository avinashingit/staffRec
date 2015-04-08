<?php

	class otherDetails
	{
		public $organization;
		public $natureOfWork;
		public $timeRequired;
		public $sop;

		function __construct($organizations,$natureOfWorks,$timeRequireds,$sops)
		{
			$this->organization=$organizations;
			$this->natureOfWork=$natureOfWorks;
			$this->timeRequired=$timeRequireds;
			$this->sop=$sops;
		}
	}

	class refereeDetails
	{
		public $names;
		public $designations;
		public $addresses;
		public $phones;
		public $emails;

		function __construct($names,$designations,$addresses,$phones,$emails)
		{
			$this->names=$names;
			$this->designations=$designations;
			$this->addresses=$addresses;
			$this->phones=$phones;
			$this->emails=$emails;
		}
	}

	class experience
	{
		public $orgs;
		public $designations;
		public $fromDates;
		public $toDates;
		public $scales;
		public $naturesOfWork;
		public $noYE;

		function __construct($orgs,$designations,$fromDates,$toDates,$scales,$naturesOfWork,$noYE)
		{
			$this->orgs=$orgs;
			$this->designations=$designations;
			$this->fromDates=$fromDates;
			$this->toDates=$toDates;
			$this->scales=$scales;
			$this->naturesOfWork=$naturesOfWork;
			$this->noYE=$noYE;
		}
	}

	class personalDetails
	{
		public $post;
		public $name;
		public $dob;
		public $nationality;
		public $sex;
		public $category;
		public $service;
		public $disabled;
		public $currentAddress;
		public $currSameAsPerm;
		public $permanentAddress;
		public $fatherName;
		public $photo;
		public $categoryCertificate;
		public $disabilityCertificate;

		function __construct($post,$name,$dob,$nationality,$sex,$category,$service,$disabled,$currentAddress,$permanentAddress,$currSameAsPerm,$fatherName,$photo,$categoryCertificate,$disabilityCertificate)
		{
			$this->post=$post;
			$this->name=$name;
			$this->dob=$dob;
			$this->nationality=$nationality;
			$this->sex=$sex;
			$this->category=$category;
			$this->service=$service;
			$this->disabled=$disabled;
			$this->currentAddress=$currentAddress;
			$this->currSameAsPerm=$currSameAsPerm;
			$this->permanentAddress=$permanentAddress;
			$this->fatherName=$fatherName;
			$this->photo=$photo;
			$this->categoryCertificate=$categoryCertificate;
			$this->disabilityCertificate=$disabilityCertificate;
		}
	}

	class additionalQualifications
	{
		public $course;
		public $duration;
		public $organization;
		public $govt;
		public $scoreType;
		public $scores;

		function __construct($course,$duration,$organization,$govt,$scoreType,$scores)
		{
			$this->course=$course;
			$this->duration=$duration;
			$this->organization=$organization;
			$this->govt=$govt;
			$this->scoreType=$scoreType;
			$this->scores=$scores;
		}
	}

	class educationalQualifications
	{

		public $degrees;
		public $branches;
		public $institutes;
		public $yoes;
		public $yols;
		public $fullTimeOrPartTimes;
		public $scoreTypes;
		public $scores;

		function __construct($degrees,$branches,$institutes,$yoes,$yols,$fullTimeOrPartTimes,$scoreTypes,$scores)
		{
			$this->degrees=$degrees;
			$this->branches=$branches;
			$this->institutes=$institutes;
			$this->yoes=$yoes;
			$this->yols=$yols;
			$this->fullTimeOrPartTimes=$fullTimeOrPartTimes;
			$this->scoreTypes=$scoreTypes;
			$this->scores=$scores;
		}
		
	}

?>