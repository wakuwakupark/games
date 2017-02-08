package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the administrators database table.
 * 
 */
@Entity
@Table(name="administrators")
@NamedQueries({
	@NamedQuery(name="Administrator.findAll", query="SELECT a FROM Administrator a")
})
public class Administrator implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	@Lob
	private String address;

	@Lob
	@Column(name="crawler_path")
	private String crawlerPath;

	@Temporal(TemporalType.TIMESTAMP)
	private Date created;

	@Temporal(TemporalType.TIMESTAMP)
	private Date deleted;

	private String email;

	@Temporal(TemporalType.TIMESTAMP)
	@Column(name="last_crawled")
	private Date lastCrawled;

	@Temporal(TemporalType.TIMESTAMP)
	private Date modified;

	private String name;

	private String password;

	private String postcode;

	@Lob
	@Column(name="reserver_path")
	private String reserverPath;

	private String tel;

	//bi-directional many-to-one association to MenberType
	@ManyToOne
	@JoinColumn(name="member_type_id")
	private MemberType memberType;

	//bi-directional many-to-one association to Facility
	@OneToMany(mappedBy="administrator", cascade=CascadeType.ALL)
	private List<Facility> facilities;

	//bi-directional many-to-one association to Password
	@OneToMany(mappedBy="administrator")
	private List<Password> passwords;

	public Administrator() {
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

	public String getCrawlerPath() {
		return this.crawlerPath;
	}

	public void setCrawlerPath(String crawlerPath) {
		this.crawlerPath = crawlerPath;
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

	public Date getLastCrawled() {
		return this.lastCrawled;
	}

	public void setLastCrawled(Date lastCrawled) {
		this.lastCrawled = lastCrawled;
	}

	public Date getModified() {
		return this.modified;
	}

	public void setModified(Date modified) {
		this.modified = modified;
	}

	public String getName() {
		return this.name;
	}

	public void setName(String name) {
		this.name = name;
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

	public String getReserverPath() {
		return this.reserverPath;
	}

	public void setReserverPath(String reserverPath) {
		this.reserverPath = reserverPath;
	}

	public String getTel() {
		return this.tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}

	public MemberType getMenberType() {
		return this.memberType;
	}

	public void setMenberType(MemberType memberType) {
		this.memberType = memberType;
	}

	public List<Facility> getFacilities() {
		return this.facilities;
	}

	public void setFacilities(List<Facility> facilities) {
		this.facilities = facilities;
	}

	public Facility addFacility(Facility facility) {
		getFacilities().add(facility);
		facility.setAdministrator(this);

		return facility;
	}

	public Facility removeFacility(Facility facility) {
		getFacilities().remove(facility);
		facility.setAdministrator(null);

		return facility;
	}

	public List<Password> getPasswords() {
		return this.passwords;
	}

	public void setPasswords(List<Password> passwords) {
		this.passwords = passwords;
	}

	public Password addPassword(Password password) {
		getPasswords().add(password);
		password.setAdministrator(this);

		return password;
	}

	public Password removePassword(Password password) {
		getPasswords().remove(password);
		password.setAdministrator(null);

		return password;
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
		Administrator other = (Administrator) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}
	
}