Tabel:Raport

raport_id(PrimaryKey)
siswa_id(ForeignKeytoSiswatable)
guru_id(ForeignKeytoGurutable)
mata_pelajaran_id(ForeignKeytoMataPelajarantable)
kuis_1
kuis_2
kuis_3
kuis_4
tugas_1
tugas_2
tugas_3
tugas_4
ulangan_harian_1
ulangan_harian_remedial_1
ulangan_harian_2
ulangan_harian_remedial_2
pr_1
pr_2
nilai_uts
remedial_uts
nilai_uas
remedial_uas

id_siswa(PK)
nomor_induk
nama_siswa
id_kelas
jenis_kelamin
tanggal_lahir
alamat
nomor_telepon
email
password
registered
role

Tabel:Users      
user_id (PK)     
username         
password         
role   

Tabel:Siswa     
siswa_id (PK) 
nomor_induk   
nama_siswa    
id_kelas      
jenis_kelamin 
tanggal_lahir 
alamat        
nomor_telepon 
email                     

Tabel:Guru     
guru_id (PK) 
nomor_induk  
nama_guru    
id_kelas     
jenis_kelamin
tanggal_lahir
alamat       
nomor_telepon
email        

Tabel: Ketidakhadiran
ketidakhadiran_id (Primary Key)
siswa_id (Foreign Key to Siswa table)
sakit
izin
alpha

Tabel: Catatan
catatan_id (Primary Key)
siswa_id (Foreign Key to Siswa table)
catatan_wali_kelas