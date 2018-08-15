<?php

/**
 * This is the model class for table "datawarga".
 *
 * The followings are the available columns in table 'datawarga':
 * @property integer $id_data_diri
 * @property string $code_id
 * @property integer $userid
 * @property integer $id_last_job_status
* @property integer $last_job_status_date
* @property integer $last_status_education
* @property integer $school_name
* @property integer $graduated_date
* @property integer $student_entry_year
* @property integer $last_status_work
* @property integer $status_work_date
* @property integer $work_place_name
 * @property string $id_ektp
 * @property string $no_ktp
 * @property string $foto
 * @property string $nama_lengkap
 * @property string $nama_depan
 * @property string $nama_tengah
 * @property string $nama_belakang
 * @property string $nama_panggilan
 * @property string $niw
 * @property integer $jenis_kelamin
 * @property string $alamat1
 * @property string $alamat2
 * @property string $wilayah
 * @property string $email
 * @property string $telepon
 * @property string $handphone
 * @property string $tempat_lahir
 * @property string $tanggal_tahun_lahir
 * @property string $agama
 * @property string $tanggal_pernikahan
 * @property string $tempat_pernikahan
 * @property string $no_akte_nikah
 * @property string $dinikahkan_oleh
 * @property string $note_kondisi_warga
 * @property string $tanggal_wafat
 * @property string $tempat_pemakaman
 * @property string $dimakamkan_oleh
 * @property string $warga_titipan
 * @property string $no_surat_wt
 * @property string $no_status_warga
 * @property string $tanggal_atestasi
 * @property string $asal_atestasi
 * @property string $no_surat_atestasi
 * @property string $tanggal_masuk_sekolah
 * @property string $tempat_masuk_sekolah
 * @property string $kepala_saat_masuk_sekolah
 * @property string $no_induk_masuk_sekolah
 * @property string $tanggal_kuliah
 * @property string $tempat_kuliah
 * @property string $kepala_tempat_kuliah
 * @property string $no_surat_kuliah
 * @property string $status_pendidikan
 * @property string $tingkat_pendidikan
 * @property string $fakultas_pendidikan
 * @property string $tempat_pendidikan
 * @property string $profesi_detail
 * @property string $profesi_alamat
 * @property string $profesi_telepon
 * @property string $profesi_email
 * @property string $pekerjaan_nama_kantor
 * @property string $pekerjaan_bidang_usaha
 * @property string $pekerjaan_jabatan_kantor
 * @property string $pekerjaan_alamat_kantor
 * @property string $pekerjaan_email_kantor
 * @property string $pelayanan_1
 * @property string $pelayanan_2
 * @property string $pelayanan_3
 * @property string $pelayanan_4
 * @property string $pelayanan_5
 * @property string $minat_hobi
 * @property string $bakat_potensi
 * @property string $nama_ibu_kandung
 * @property integer $id_ibu_kandung
 * @property integer $niw_ibu_kandung
 * @property string $nama_ayah_kandung
 * @property integer $id_ayah_kandung
 * @property integer $niw_ayah_kandung
 * @property string $kontak_keluarga
 * @property string $alamat_keluarga
 * @property string $no_telepon_keluarga
 * @property string $hubungan_keluarga
 * @property string $memo
 * @property string $last_update
 */
class DataDiri extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datadiri';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_data_diri,userid, id_ektp, jenis_kelamin, no_ktp, nama_lengkap, nama_depan, nama_tengah, nama_belakang, nama_panggilan, niw, alamat1, alamat2, wilayah, email, telepon, handphone, tempat_lahir, tanggal_tahun_lahir, agama', 'required'),
			array('userid, jenis_kelamin, nama_lengkap, tempat_lahir, tanggal_tahun_lahir, nama_panggilan,alamat1', 'required'),
			array('id_data_diri, id_last_job_status, student_entry_year, id_ibu_kandung,jenis_kelamin, id_ayah_kandung', 'numerical', 'integerOnly'=>true),
			array('id_ektp, no_ktp, niw, agama, no_akte_nikah, tempat_pemakaman, dimakamkan_oleh, no_surat_wt, no_status_warga, no_surat_atestasi, no_induk_masuk_sekolah, no_surat_kuliah, status_pendidikan', 'length', 'max'=>30),
			array('foto, nama_lengkap, nama_depan, nama_tengah, nama_belakang, nama_panggilan, alamat1, alamat2, wilayah, tempat_lahir, tempat_pernikahan, dinikahkan_oleh, note_kondisi_warga, warga_titipan, asal_atestasi, tempat_masuk_sekolah, kepala_saat_masuk_sekolah, tempat_kuliah, kepala_tempat_kuliah, tingkat_pendidikan, fakultas_pendidikan, tempat_pendidikan, profesi_detail, profesi_alamat, profesi_email, pekerjaan_nama_kantor, pekerjaan_bidang_usaha, pekerjaan_jabatan_kantor, pekerjaan_alamat_kantor, pekerjaan_email_kantor, pelayanan_1, pelayanan_2, pelayanan_3, pelayanan_4, pelayanan_5, minat_hobi, bakat_potensi, nama_ibu_kandung, nama_ayah_kandung, kontak_keluarga, alamat_keluarga', 'length', 'max'=>50),
			array('telepon, handphone', 'length', 'max'=>15),
			array('code_id', 'length', 'max'=>100),
			array('profesi_telepon, no_telepon_keluarga', 'length', 'max'=>20),
			array('memo, last_status_education, last_status_work', 'length', 'max'=>150),
			array('work_place_name, school_name', 'length', 'max'=>250),
			array('last_job_status_date, graduated_date, status_work_date, tanggal_pernikahan, tanggal_wafat, tanggal_atestasi, tanggal_masuk_sekolah, tanggal_kuliah, last_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_data_diri,code_id,userid, id_last_job_status, last_job_status_date, last_status_education, school_name, graduated_date, student_entry_year, last_status_work, status_work_date, work_place_name, id_ektp, no_ktp, foto, nama_lengkap, nama_depan, nama_tengah, nama_belakang, nama_panggilan, niw, jenis_kelamin, alamat1, alamat2, wilayah, telepon, handphone, tempat_lahir, tanggal_tahun_lahir, agama, tanggal_pernikahan, tempat_pernikahan, no_akte_nikah, dinikahkan_oleh, note_kondisi_warga, tanggal_wafat, tempat_pemakaman, dimakamkan_oleh, warga_titipan, no_surat_wt, no_status_warga, tanggal_atestasi, asal_atestasi, no_surat_atestasi, tanggal_masuk_sekolah, tempat_masuk_sekolah, kepala_saat_masuk_sekolah, no_induk_masuk_sekolah, tanggal_kuliah, tempat_kuliah, kepala_tempat_kuliah, no_surat_kuliah, status_pendidikan, tingkat_pendidikan, fakultas_pendidikan, tempat_pendidikan, profesi_detail, profesi_alamat, profesi_telepon, profesi_email, pekerjaan_nama_kantor, pekerjaan_bidang_usaha, pekerjaan_jabatan_kantor, pekerjaan_alamat_kantor, pekerjaan_email_kantor, pelayanan_1, pelayanan_2, pelayanan_3, pelayanan_4, pelayanan_5, minat_hobi, bakat_potensi, nama_ibu_kandung, id_ibu_kandung, niw_ibu_kandung, nama_ayah_kandung, id_ayah_kandung, niw_ayah_kandung, kontak_keluarga, alamat_keluarga, no_telepon_keluarga, hubungan_keluarga, memo, last_update', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'LastJobStatus' => array(self::BELONGS_TO, 'MstJobStatus', 'id_last_job_status'),
			'user' => array(self::BELONGS_TO, 'Users', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_data_diri' => Yii::t('strings','Profile ID'),
			'code_id' => 'Code Id',
			'userid' => 'User ID',
			'id_last_job_status' => Yii::t('strings','Last Job Status'),
			'last_job_status_date' => Yii::t('strings','Last Job Status Date'),
			'last_status_education'=> Yii::t('strings','Last Status Education'),
			'school_name'=> Yii::t('strings','School Name'),
			'graduated_date'=> Yii::t('strings','Graduated Date'),
			'student_entry_year'=> Yii::t('strings','Student Entry Year'),
			'last_status_work'=> Yii::t('strings','Name Status Last Work'),
			'status_work_date'=> Yii::t('strings','Status Work Date'),
			'work_place_name'=> Yii::t('strings','Work Place Name'),
			'id_ektp' => 'ID E-KTP',
			'no_ktp' => 'No KTP',
			'foto' => 'Foto',
			'nama_lengkap' => Yii::t('strings','Full Name'),
			'nama_depan' => Yii::t('strings','First Name'),
			'nama_tengah' => Yii::t('strings','Middle Name'),
			'nama_belakang' => Yii::t('strings','Last Name'),
			'nama_panggilan' => Yii::t('strings','Nick Name'),
			'niw' => 'NIW',
			'jenis_kelamin' => Yii::t('strings','Gender'),
			'alamat1' => Yii::t('strings','Address [1]'),
			'alamat2' => Yii::t('strings','Address [2]'),
			'wilayah' => 'Wilayah Jemaat',
			//'email' => 'Email',
			'telepon' => 'Telepon',
			'handphone' => 'Handphone',
			'tempat_lahir' => Yii::t('strings','Birth Place'),
			'tanggal_tahun_lahir' => Yii::t('strings','Birthdate'),
			'agama' => Yii::t('strings','Religion'),
			'tanggal_pernikahan' => 'Tanggal Pernikahan',
			'tempat_pernikahan' => 'Tempat Pernikahan',
			'no_akte_nikah' => 'No Akte Nikah',
			'dinikahkan_oleh' => 'Dinikahkan Oleh',
			'note_kondisi_warga' => 'Note Kondisi Warga',
			'tanggal_wafat' => 'Tanggal Wafat',
			'tempat_pemakaman' => 'Tempat Pemakaman',
			'dimakamkan_oleh' => 'Dimakamkan Oleh',
			'warga_titipan' => 'Warga Titipan',
			'no_surat_wt' => 'No Surat Wt',
			'no_status_warga' => 'No Status Warga',
			'tanggal_atestasi' => 'Tanggal Atestasi',
			'asal_atestasi' => 'Asal Atestasi',
			'no_surat_atestasi' => 'No Surat Atestasi',
			'tanggal_masuk_sekolah' => 'Tanggal Masuk Sekolah',
			'tempat_masuk_sekolah' => 'Tempat Masuk Sekolah',
			'kepala_saat_masuk_sekolah' => 'Kepala Saat Masuk Sekolah',
			'no_induk_masuk_sekolah' => 'No Induk Masuk Sekolah',
			'tanggal_kuliah' => 'Tanggal Kuliah',
			'tempat_kuliah' => 'Tempat Kuliah',
			'kepala_tempat_kuliah' => 'Kepala Tempat Kuliah',
			'no_surat_kuliah' => 'No Surat Kuliah',
			'status_pendidikan' => 'Status Pendidikan',
			'tingkat_pendidikan' => 'Tingkat Pendidikan',
			'fakultas_pendidikan' => 'Fakultas Pendidikan',
			'tempat_pendidikan' => 'Tempat Pendidikan',
			'profesi_detail' => 'Profesi Detail',
			'profesi_alamat' => 'Profesi Alamat',
			'profesi_telepon' => 'Profesi Telepon',
			'profesi_email' => 'Profesi Email',
			'pekerjaan_nama_kantor' => 'Pekerjaan Nama Kantor',
			'pekerjaan_bidang_usaha' => 'Pekerjaan Bidang Usaha',
			'pekerjaan_jabatan_kantor' => 'Pekerjaan Jabatan Kantor',
			'pekerjaan_alamat_kantor' => 'Pekerjaan Alamat Kantor',
			'pekerjaan_email_kantor' => 'Pekerjaan Email Kantor',
			'pelayanan_1' => 'Pelayanan 1',
			'pelayanan_2' => 'Pelayanan 2',
			'pelayanan_3' => 'Pelayanan 3',
			'pelayanan_4' => 'Pelayanan 4',
			'pelayanan_5' => 'Pelayanan 5',
			'minat_hobi' => 'Minat Hobi',
			'bakat_potensi' => 'Bakat Potensi',
			'nama_ibu_kandung' => 'Nama Ibu Kandung',
			'id_ibu_kandung' => 'ID Ibu Kandung',
			'niw_ibu_kandung' => 'NIW Ibu Kandung',
			'nama_ayah_kandung' => 'Nama Ayah Kandung',
			'id_ayah_kandung' => 'ID Ayah Kandung',
			'niw_ayah_kandung' => 'NIW Ayah Kandung',
			'kontak_keluarga' => 'Nama Keluarga / Kerabat',
			'alamat_keluarga' => 'Alamat Keluarga / Kerabat',
			'no_telepon_keluarga' => 'No Telepon Keluarga / Kerabat',
			'hubungan_keluarga' => 'Hubungan Keluarga / Kerabat',
			'memo' => 'Memo',
			'last_update' => 'Last Update',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_data_diri',$this->id_data_diri);
		$criteria->compare('userid',$this->userid);

		$criteria->compare('code_id',$this->code_id);

		$criteria->compare('id_last_job_status',$this->id_last_job_status,true);
		$criteria->compare('last_job_status_date',$this->last_job_status_date,true);
		$criteria->compare('last_status_education',$this->last_status_education,true);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('graduated_date',$this->graduated_date,true);
		$criteria->compare('student_entry_year',$this->student_entry_year,true);
		$criteria->compare('last_status_work',$this->last_status_work,true);
		$criteria->compare('status_work_date',$this->status_work_date,true);
		$criteria->compare('work_place_name',$this->work_place_name,true);


		$criteria->compare('id_ektp',$this->id_ektp,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('nama_depan',$this->nama_depan,true);
		$criteria->compare('nama_tengah',$this->nama_tengah,true);
		$criteria->compare('nama_belakang',$this->nama_belakang,true);
		$criteria->compare('nama_panggilan',$this->nama_panggilan,true);
		$criteria->compare('niw',$this->niw,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin);
		$criteria->compare('alamat1',$this->alamat1,true);
		$criteria->compare('alamat2',$this->alamat2,true);
		$criteria->compare('wilayah',$this->wilayah,true);
		//$criteria->compare('email',$this->email,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('handphone',$this->handphone,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_tahun_lahir',$this->tanggal_tahun_lahir,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('tanggal_pernikahan',$this->tanggal_pernikahan,true);
		$criteria->compare('tempat_pernikahan',$this->tempat_pernikahan,true);
		$criteria->compare('no_akte_nikah',$this->no_akte_nikah,true);
		$criteria->compare('dinikahkan_oleh',$this->dinikahkan_oleh,true);
		$criteria->compare('note_kondisi_warga',$this->note_kondisi_warga,true);
		$criteria->compare('tanggal_wafat',$this->tanggal_wafat,true);
		$criteria->compare('tempat_pemakaman',$this->tempat_pemakaman,true);
		$criteria->compare('dimakamkan_oleh',$this->dimakamkan_oleh,true);
		$criteria->compare('warga_titipan',$this->warga_titipan,true);
		$criteria->compare('no_surat_wt',$this->no_surat_wt,true);
		$criteria->compare('no_status_warga',$this->no_status_warga,true);
		$criteria->compare('tanggal_atestasi',$this->tanggal_atestasi,true);
		$criteria->compare('asal_atestasi',$this->asal_atestasi,true);
		$criteria->compare('no_surat_atestasi',$this->no_surat_atestasi,true);
		$criteria->compare('tanggal_masuk_sekolah',$this->tanggal_masuk_sekolah,true);
		$criteria->compare('tempat_masuk_sekolah',$this->tempat_masuk_sekolah,true);
		$criteria->compare('kepala_saat_masuk_sekolah',$this->kepala_saat_masuk_sekolah,true);
		$criteria->compare('no_induk_masuk_sekolah',$this->no_induk_masuk_sekolah,true);
		$criteria->compare('tanggal_kuliah',$this->tanggal_kuliah,true);
		$criteria->compare('tempat_kuliah',$this->tempat_kuliah,true);
		$criteria->compare('kepala_tempat_kuliah',$this->kepala_tempat_kuliah,true);
		$criteria->compare('no_surat_kuliah',$this->no_surat_kuliah,true);
		$criteria->compare('status_pendidikan',$this->status_pendidikan,true);
		$criteria->compare('tingkat_pendidikan',$this->tingkat_pendidikan,true);
		$criteria->compare('fakultas_pendidikan',$this->fakultas_pendidikan,true);
		$criteria->compare('tempat_pendidikan',$this->tempat_pendidikan,true);
		$criteria->compare('profesi_detail',$this->profesi_detail,true);
		$criteria->compare('profesi_alamat',$this->profesi_alamat,true);
		$criteria->compare('profesi_telepon',$this->profesi_telepon,true);
		$criteria->compare('profesi_email',$this->profesi_email,true);
		$criteria->compare('pekerjaan_nama_kantor',$this->pekerjaan_nama_kantor,true);
		$criteria->compare('pekerjaan_bidang_usaha',$this->pekerjaan_bidang_usaha,true);
		$criteria->compare('pekerjaan_jabatan_kantor',$this->pekerjaan_jabatan_kantor,true);
		$criteria->compare('pekerjaan_alamat_kantor',$this->pekerjaan_alamat_kantor,true);
		$criteria->compare('pekerjaan_email_kantor',$this->pekerjaan_email_kantor,true);
		$criteria->compare('pelayanan_1',$this->pelayanan_1,true);
		$criteria->compare('pelayanan_2',$this->pelayanan_2,true);
		$criteria->compare('pelayanan_3',$this->pelayanan_3,true);
		$criteria->compare('pelayanan_4',$this->pelayanan_4,true);
		$criteria->compare('pelayanan_5',$this->pelayanan_5,true);
		$criteria->compare('minat_hobi',$this->minat_hobi,true);
		$criteria->compare('bakat_potensi',$this->bakat_potensi,true);
		$criteria->compare('nama_ibu_kandung',$this->nama_ibu_kandung,true);
		$criteria->compare('id_ibu_kandung',$this->id_ibu_kandung);
		$criteria->compare('niw_ibu_kandung',$this->niw_ibu_kandung);
		$criteria->compare('nama_ayah_kandung',$this->nama_ayah_kandung,true);
		$criteria->compare('id_ayah_kandung',$this->id_ayah_kandung);
		$criteria->compare('niw_ayah_kandung',$this->niw_ayah_kandung);
		$criteria->compare('kontak_keluarga',$this->kontak_keluarga,true);
		$criteria->compare('alamat_keluarga',$this->alamat_keluarga,true);
		$criteria->compare('no_telepon_keluarga',$this->no_telepon_keluarga,true);
		$criteria->compare('hubungan_keluarga',$this->hubungan_keluarga,true);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DataWarga the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
/*
	public function beforeSave()
	{
	$this->tanggal_tahun_lahir=date("Y-m-d",strtotime($this->tanggal_tahun_lahir));
	
	return TRUE;
	}

	public function afterFind()
	{
	$this->tanggal_tahun_lahir=date("d-m-Y",strtotime($this->tanggal_tahun_lahir));

	if ($this->jenis_kelamin==1)
	{
		$this->jenis_kelamin="Laki - Laki";
	}
	else  if ($this->jenis_kelamin==2)
	{
		$this->jenis_kelamin="Perempuan";
	}
	
	return true;
	}
*/
	public function getjk()
	{
		if($this->jenis_kelamin == 1)
			return Yii::t('strings','Male');
			
		if($this->jenis_kelamin == 2)
			return Yii::t('strings','Female');
	}
	
	public function getBirthdate()
	{
		if($this->tanggal_tahun_lahir != ""){
			if($this->tanggal_tahun_lahir == '0000-00-00'){
				return "-";
			}else{
				return $this->tanggal_tahun_lahir;
			}
		}else{
			return "-";
		}
	}
}
