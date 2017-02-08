package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the facilities database table.
 * 
 */
@Entity
@Table(name="facilities")
@NamedQueries({ 
	@NamedQuery(name = "Facility.findAll", query = "SELECT f FROM Facility f"),
	@NamedQuery(name = "Facility.findByName", query = "SELECT f FROM Facility f WHERE f.administrator = :administrator AND f.name = :name")
})
public class Facility implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	@Lob
	private String address;

	@Column(name="crawler_path")
	private String crawlerPath;

	@Temporal(TemporalType.TIMESTAMP)
	private Date created;

	@Temporal(TemporalType.TIMESTAMP)
	private Date deleted;

	@Lob
	private String description;

	private double latitude;

	private double longitude;

	@Temporal(TemporalType.TIMESTAMP)
	private Date modified;

	private String name;

	private String postcode;

	@Column(name="reserver_path")
	private String reserverPath;

	private String url;

	//bi-directional many-to-one association to Court
	@OneToMany(mappedBy="facility", cascade=CascadeType.ALL)
	private List<Court> courts;

	//bi-directional many-to-one association to Administrator
	@ManyToOne
	private Administrator administrator;

	//bi-directional many-to-one association to FacilityImage
	@OneToMany(mappedBy="facility", cascade=CascadeType.ALL)
	private List<FacilityImage> facilityImages;

	//bi-directional many-to-one association to Wait
	@OneToMany(mappedBy="facility", cascade=CascadeType.ALL)
	private List<Wait> waits;

	public Facility() {
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

	public String getDescription() {
		return this.description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public double getLatitude() {
		return this.latitude;
	}

	public void setLatitude(double latitude) {
		this.latitude = latitude;
	}

	public double getLongitude() {
		return this.longitude;
	}

	public void setLongitude(double longitude) {
		this.longitude = longitude;
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

	public String getUrl() {
		return this.url;
	}

	public void setUrl(String url) {
		this.url = url;
	}

	public List<Court> getCourts() {
		return this.courts;
	}

	public void setCourts(List<Court> courts) {
		this.courts = courts;
	}

	public Court addCourt(Court court) {
		getCourts().add(court);
		court.setFacility(this);

		return court;
	}

	public Court removeCourt(Court court) {
		getCourts().remove(court);
		court.setFacility(null);

		return court;
	}

	public Administrator getAdministrator() {
		return this.administrator;
	}

	public void setAdministrator(Administrator administrator) {
		this.administrator = administrator;
	}

	public List<FacilityImage> getFacilityImages() {
		return this.facilityImages;
	}

	public void setFacilityImages(List<FacilityImage> facilityImages) {
		this.facilityImages = facilityImages;
	}

	public FacilityImage addFacilityImage(FacilityImage facilityImage) {
		getFacilityImages().add(facilityImage);
		facilityImage.setFacility(this);

		return facilityImage;
	}

	public FacilityImage removeFacilityImage(FacilityImage facilityImage) {
		getFacilityImages().remove(facilityImage);
		facilityImage.setFacility(null);

		return facilityImage;
	}

	public List<Wait> getWaits() {
		return this.waits;
	}

	public void setWaits(List<Wait> waits) {
		this.waits = waits;
	}

	public Wait addWait(Wait wait) {
		getWaits().add(wait);
		wait.setFacility(this);

		return wait;
	}

	public Wait removeWait(Wait wait) {
		getWaits().remove(wait);
		wait.setFacility(null);

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
		Facility other = (Facility) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}