package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the users database table.
 * 
 */
@Entity
@Table(name="users")
@NamedQuery(name="User.findAll", query="SELECT u FROM User u")
public class User implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	@Lob
	private String address;

	@Temporal(TemporalType.TIMESTAMP)
	private Date birthday;

	@Temporal(TemporalType.TIMESTAMP)
	private Date created;

	@Temporal(TemporalType.TIMESTAMP)
	private Date deleted;

	private String email;

	@Column(name="family_name")
	private String familyName;

	@Column(name="first_name")
	private String firstName;

	private int gender;

	@Temporal(TemporalType.TIMESTAMP)
	private Date modified;

	private String password;

	private String postcode;

	private String tel;

	//bi-directional many-to-one association to Password
	@OneToMany(mappedBy="user", cascade=CascadeType.ALL)
	private List<Password> passwords;

	//bi-directional many-to-one association to Reserve
	@OneToMany(mappedBy="user", cascade=CascadeType.ALL)
	private List<Reserve> reserves;

	//bi-directional many-to-one association to MenberType
	@ManyToOne
	@JoinColumn(name="member_type_id")
	private MemberType memberType;

	//bi-directional many-to-one association to Job
	@ManyToOne
	private Job job;

	//bi-directional many-to-one association to Wait
	@OneToMany(mappedBy="user", cascade=CascadeType.ALL)
	private List<Wait> waits;

	public User() {
	}

	public Integer getId() {
		return this.id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getAddress() {
		return this.address;
	}

	public void setAddress(String address) {
		this.address = address;
	}

	public Date getBirthday() {
		return this.birthday;
	}

	public void setBirthday(Date birthday) {
		this.birthday = birthday;
	}

	public Date getCreated() {
		return this.created;
	}

	public void setCreated(Date created) {
		this.created = created;
	}

	public Date getDeleted() {
		return this.deleted;
	}

	public void setDeleted(Date deleted) {
		this.deleted = deleted;
	}

	public String getEmail() {
		return this.email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getFamilyName() {
		return this.familyName;
	}

	public void setFamilyName(String familyName) {
		this.familyName = familyName;
	}

	public String getFirstName() {
		return this.firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public int getGender() {
		return this.gender;
	}

	public void setGender(int gender) {
		this.gender = gender;
	}

	public Date getModified() {
		return this.modified;
	}

	public void setModified(Date modified) {
		this.modified = modified;
	}

	public String getPassword() {
		return this.password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getPostcode() {
		return this.postcode;
	}

	public void setPostcode(String postcode) {
		this.postcode = postcode;
	}

	public String getTel() {
		return this.tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}

	public List<Password> getPasswords() {
		return this.passwords;
	}

	public void setPasswords(List<Password> passwords) {
		this.passwords = passwords;
	}

	public Password addPassword(Password password) {
		getPasswords().add(password);
		password.setUser(this);

		return password;
	}

	public Password removePassword(Password password) {
		getPasswords().remove(password);
		password.setUser(null);

		return password;
	}

	public List<Reserve> getReserves() {
		return this.reserves;
	}

	public void setReserves(List<Reserve> reserves) {
		this.reserves = reserves;
	}

	public Reserve addReserve(Reserve reserve) {
		getReserves().add(reserve);
		reserve.setUser(this);

		return reserve;
	}

	public Reserve removeReserve(Reserve reserve) {
		getReserves().remove(reserve);
		reserve.setUser(null);

		return reserve;
	}

	public MemberType getMemberType() {
		return memberType;
	}

	public void setMemberType(MemberType memberType) {
		this.memberType = memberType;
	}

	public Job getJob() {
		return this.job;
	}

	public void setJob(Job job) {
		this.job = job;
	}

	public List<Wait> getWaits() {
		return this.waits;
	}

	public void setWaits(List<Wait> waits) {
		this.waits = waits;
	}

	public Wait addWait(Wait wait) {
		getWaits().add(wait);
		wait.setUser(this);

		return wait;
	}

	public Wait removeWait(Wait wait) {
		getWaits().remove(wait);
		wait.setUser(null);

		return wait;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((id == null) ? 0 : id.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		User other = (User) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}
}